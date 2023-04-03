<?php

namespace App\Http\Controllers;

use App\Models\SolicitudEquipos;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
//Para formatear fechas
use Carbon\Carbon;

class SolicitudEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
    }
    public function index()
    {
        $solicitudes = SolicitudEquipos::all();
        return view('solicitudequipos.index',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoEquipo::all();
        return view('solicitudequipos.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ID_TIPO_EQUIPOS' => 'required',
            'MOTIVO_SOL_EQUIPO' => 'required|max:1000',
            'FECHA_SOL_EQUIPO' => 'required',
            'HORA_INICIO_SOL_EQUIPO' => 'required|date_format:H:i',
            'HORA_TERM_SOL_EQUIPO' => 'required|date_format:H:i|after:HORA_INICIO_SOL_EQUIPO',
        ];
        
        $messages = [
            'ID_TIPO_EQUIPOS.required' => 'Debe seleccionar un tipo de equipo.',
            'MOTIVO_SOL_EQUIPO.required' => 'El campo motivo de solicitud es obligatorio.',
            'MOTIVO_SOL_EQUIPO.max' => 'El campo motivo de solicitud no puede exceder los 1000 caracteres.',
            'FECHA_SOL_EQUIPO.required' => 'El campo fecha de inicio es obligatorio.',
            'HORA_INICIO_SOL_EQUIPO.required' => 'El campo hora de inicio es obligatorio.',
            'HORA_INICIO_SOL_EQUIPO.date_format' => 'El formato de la hora de inicio es incorrecto.',
            'HORA_TERM_SOL_EQUIPO.required' => 'El campo hora de término es obligatorio.',
            'HORA_TERM_SOL_EQUIPO.date_format' => 'El formato de la hora de término es incorrecto.',
            'HORA_TERM_SOL_EQUIPO.after' => 'La hora de término debe ser mayor que la hora de inicio.',
        ];
        $request->validate($rules, $messages);
        $data = $request->except('_token');
        // Formatear la fecha usando Carbon
        $fecha = Carbon::createFromFormat('d-m-Y', $request['FECHA_SOL_EQUIPO'])->format('Y-m-d');
        $data['FECHA_SOL_EQUIPO'] = $fecha;

        $rut = intval(str_replace(['.', '-'], '', $request['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        //Guardar en BDD
        try{
            SolicitudEquipos::create($data);
            session()->flash('success','La solicitud de equipo ha sido enviada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al enviar la solicitud, vuelva a enviarlo más tarde.' . $e->getMessage());
        }
        return redirect('/solequipos');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $solicitud = SolicitudEquipos::find($id);
        return view('solicitudequipos.show',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudEquipos $solicitudEquipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitudEquipos $solicitudEquipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudEquipos $solicitudEquipos)
    {
        //
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
