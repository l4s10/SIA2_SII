<?php

namespace App\Http\Controllers;
//Importamos modelos que usaremos para las solcitudes
use App\Models\TipoServicio;
use App\Models\TipoVehiculo;
use App\Models\Vehiculo;
use App\Models\SolicitudReparacionVehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SolicitudReparacionVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware(['auth', 'checkRelFunWithServicesPermissions']);
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasAnyRole(['ADMINISTRADOR','SERVICIOS'])){
            $sol_rep_veh = SolicitudReparacionVehiculo::all();
        } else {
            $sol_rep_veh = SolicitudReparacionVehiculo::where('ID_USUARIO', $user->id)->get();
        }
        $tipos_servicio = TipoServicio::all();
        return view('repyman.rep_veh.index',compact('sol_rep_veh','tipos_servicio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Listar tipos de servicio y tipo de auto?
        $tipos_servicio = TipoServicio::all();
        $tipo_vehiculos = TipoVehiculo::all();
        $vehiculos = Vehiculo::all();
        return view('repyman.rep_veh.create',compact('tipos_servicio','tipo_vehiculos','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Definimos las reglas de los campos y los mensajes de error para cada uno de ellos.
        $rules = [
            'NOMBRE_SOLICITANTE' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zñÑ\s]+$/u'],
            'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'EMAIL' => 'required|email',
            'PATENTE_VEHICULO' => 'required',
            'ID_TIPO_SERVICIO' => 'required',
            'DETALLE_REPARACION_REP_VEH' => 'required|max:1000',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El campo Nombre del solicitante solo puede contener letras y espacios.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.regex' => 'El campo RUT solo debe contener números, puntos y guiones.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 12 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'DEPTO.regex' => 'El campo Departamento solo puede contener letras y espacios.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
            'PATENTE_VEHICULO.required' => 'La patente del vehículo es obligatoria',
            'ID_TIPO_SERVICIO.required' => 'El tipo de Servicio es obligatorio',
            'DETALLE_REPARACION_REP_VEH.required' => 'El motivo de reparación es obligatorio',
            'DETALLE_REPARACION_REP_VEH.max' => 'El campo Motivo de Reparación no debe superar los 1000 caracteres',
        ];
        //Funcion que valida nuestros datos enviados en el formulario en base a las reglas.
        $request->validate($rules, $messages);
        //Se crea la variable data que almacena los datos validados (excepto el token de verificacion)
        $data = $request->except('_token');
        // Formatear el RUT antes de almacenarlo en la base de datos
        $rut = intval(str_replace(['.', '-'], '', $data['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        //Guardar en BDD.

        try{
            SolicitudReparacionVehiculo::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente!.');
        }catch(\Exception $e){
            session()->flash('error','Error al enviar la solicitud, vuelva a intentarlo mas tarde'. $e->getMessage());
        }
        return redirect(route('repvehiculos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitudReparacionVehiculo $solicitudReparacionVehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitud = SolicitudReparacionVehiculo::find($id);
        $tipos_servicio = TipoServicio::all();
        $tipo_vehiculos = TipoVehiculo::all();
        $vehiculos = Vehiculo::all();
        return view('repyman.rep_veh.edit',compact('solicitud','tipos_servicio','tipo_vehiculos','vehiculos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $solicitud = SolicitudReparacionVehiculo::find($id);
        //Definimos las reglas de los campos y los mensajes de error para cada uno de ellos.
        $rules = [
            'NOMBRE_SOLICITANTE' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zñÑ\s]+$/u'],
            'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'EMAIL' => 'required|email',
            'PATENTE_VEHICULO' => 'required',
            'ID_TIPO_SERVICIO' => 'required',
            'DETALLE_REPARACION_REP_VEH' => 'required|max:1000',
            'FECHA_INICIO_REP_VEH' => 'required|date',
            'FECHA_TERMINO_REP_VEH' => 'required|date|after_or_equal:FECHA_INICIO_REP_VEH',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El campo Nombre del solicitante solo puede contener letras y espacios.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.regex' => 'El campo RUT solo debe contener números, puntos y guiones.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 12 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'DEPTO.regex' => 'El campo Departamento solo puede contener letras y espacios.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
            'PATENTE_VEHICULO.required' => 'El campo Patente del Vehículo es obligatorio',
            'ID_TIPO_SERVICIO.required' => 'El campo Tipo de Servicio es obligatorio',
            'DETALLE_REPARACION_REP_VEH.required' => 'El campo Motivo de Reparación es obligatorio',
            'DETALLE_REPARACION_REP_VEH.max' => 'El campo Motivo de Reparación no debe superar los 1000 caracteres',
            'FECHA_INICIO_REP_VEH.required' => 'La fecha de inicio es obligatoria.',
            'FECHA_INICIO_REP_VEH.date' => 'La fecha de inicio no es válida.',
            'FECHA_TERMINO_REP_VEH.required' => 'La fecha de término es obligatoria.',
            'FECHA_TERMINO_REP_VEH.date' => 'La fecha de término no es válida.',
            'FECHA_TERMINO_REP_VEH.after_or_equal' => 'La fecha de término debe ser igual o posterior a la fecha de inicio.',
        ];
        //Funcion que valida nuestros datos enviados en el formulario en base a las reglas.
        $request->validate($rules, $messages);
        //Se crea la variable data que almacena los datos validados (excepto el token de verificacion)
        $data = $request->except('_token');
        // Formatear el RUT antes de almacenarlo en la base de datos
        $rut = intval(str_replace(['.', '-'], '', $data['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        //Guardar en BDD.
        try{
            $solicitud->update($request->all());
            session()->flash('success','La solicitud de reparacion ha sido modificada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect(route('repvehiculos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = SolicitudReparacionVehiculo::find($id);
        try{
            $request->delete();
            session()->flash('success','La solicitud de reparación se eliminó exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la solicitud seleccionada.');
        }
        return redirect(route('repvehiculos.index'));
    }
    //-----FUNCION QUE NOS PERMITE FORMATEAR EL RUT CON  PUNTOS Y GUIÓN.------
    public function formatRut($rut) {
        $rut = preg_replace('/[^0-9kK]/', '', $rut); // Remueve todos los caracteres excepto los números y la letra K
        $dv = substr($rut, -1); // Obtiene el dígito verificador
        $rut = substr($rut, 0, -1); // Remueve el dígito verificador del número completo
        $rut_array = str_split(strrev($rut), 3); // Divide el número completo en grupos de 3 dígitos, comenzando desde el final
        $rut = implode('.', $rut_array); // Une los grupos de 3 dígitos con un punto
        return strrev($rut) . '-' . strtoupper($dv); // Retorna el RUT con guion y el dígito verificador en mayúscula
    }
}
