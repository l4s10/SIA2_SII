<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelFunVeh;
use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\User;
use App\Models\Ubicacion;
use App\Models\Comuna;
use App\Models\Region;
use App\Models\DireccionRegional;
use App\Models\Cargo;
use Illuminate\Support\Facades\Auth;    //PARA VALIDAR SESION DE USUARIO
use Illuminate\Support\Facades\Hash;    //PARA VALIDAR CONTRASEÑA
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Rules\RutRule;

use Dompdf\Dompdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class RelFunVehController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        //!!AGREGAR MIDDLEWARE PARA DAR ACCESO AL USUARIO A RENDIR
        $this->middleware( ['auth', 'checkRelFunWithServicesPermissions'] );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'SERVICIOS'])) {
            $solicitudes = RelFunVeh::all();
        } else {
            $solicitudes = RelFunVeh::where(function($query) use ($user) {
                $query->where('ID_USUARIO', $user->id)  // Solicitudes creadas por el usuario
                    ->orWhere('CONDUCTOR', $user->id)  // Solicitudes donde el usuario es conductor
                    ->orWhere('OCUPANTE_1', $user->id)
                    ->orWhere('OCUPANTE_2', $user->id)
                    ->orWhere('OCUPANTE_3', $user->id)
                    ->orWhere('OCUPANTE_4', $user->id)
                    ->orWhere('OCUPANTE_5', $user->id)
                    ->orWhere('OCUPANTE_6', $user->id)  // Solicitudes donde el usuario es ocupante
                    ->orWhere('DEPTO', $user->ubicacion->UBICACION); //Solicitudes de un mismo departamento
            })->get();
        }

        return view('rel_fun_veh.index', compact('solicitudes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cargar usuario
        $ubicacionUser = Ubicacion::findOrFail(Auth::user()->ID_UBICACION);
        $direccionFiltrada = $ubicacionUser->direccion;
        $ubicacionesFiltradas = $direccionFiltrada->ubicaciones;
        //*Crear solicitud
        $vehiculos = Vehiculo::all();
        $tipo_vehiculos = TipoVehiculo::all();
        $usuarios = User::all();
        $regiones = Region::all();
        // $direcciones = DireccionRegional::all();
        // $ubicaciones = Ubicacion::where('ID_DIRECCION', );
        $comunas = Comuna::all();
        return view('rel_fun_veh.create', compact('vehiculos','tipo_vehiculos','usuarios','regiones','direccionFiltrada','ubicacionesFiltradas','comunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*Guardar solicitud
        try{

            $rules = [
                'NOMBRE_SOLICITANTE' => 'required|string|max:255',
                'RUT' => ['required', 'string', 'max:12', 'regex:/^[0-9]{7,8}-[0-9kK]{1}$/i', new RutRule], // Asume que RutRule es una regla personalizada que valida el dígito verificador del RUT
                'DEPTO' => 'required|string|max:255',
                'EMAIL' => 'required|email|max:255',
                'ID_TIPO_VEH' => 'required|exists:tipo_vehiculo,ID_TIPO_VEH',
                'MOTIVO_SOL_VEH' => 'required|string|max:1000',
                'FECHA_SOL_VEH' => 'required|string|max:255',
                'HORA_SALIDA' => 'required|date_format:H:i',
                'HORA_LLEGADA' => 'required|date_format:H:i',
                'REGION_ORIGEN' => 'required|exists:region,ID_REGION',
                'REGION_DESTINO' => 'required|exists:region,ID_REGION',
                'ORIGEN' => 'required|exists:comunas,ID_COMUNA',
                'DESTINO' => 'required|exists:comunas,ID_COMUNA',
                'ESTADO_SOL_VEH' => 'required|string|in:INGRESADO', // Asume que 'estado1', 'estado2' y 'estado3' son los únicos estados válidos
            ];

            $messages = [
                'RUT.regex' => 'El formato del RUT no es válido. Debe ser en el formato XXXXXXXX-X.',
                'required' => 'El campo :attribute es obligatorio.',
                'exists' => 'El campo :attribute no existe en la base de datos.',
                'string' => 'El campo :attribute debe ser una cadena de texto.',
                'max' => 'El campo :attribute no debe exceder :max caracteres.',
                'email' => 'El campo :attribute debe ser una dirección de correo válida.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()
                    ->route('solicitud.vehiculos.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $conductor = $request->input('OCUPANTE_1');
            $data = $request->except('_token');
            $data['CONDUCTOR'] = $conductor;

            RelFunVeh::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            // session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo mas tarde' . $e->getMessage());
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo mas tarde');
        }
        return redirect(route('solicitud.vehiculos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $solicitud = RelFunVeh::find($id);
            return view('rel_fun_veh.show',compact('solicitud'));
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al cargar la solicitud, vuelva a intentarlo mas tarde');
            return redirect(route('solicitud.vehiculos.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $solicitud = RelFunVeh::find($id);
            $direcciones = DireccionRegional::all();
            $vehiculos = Vehiculo::all();
            $tipo_vehiculos = TipoVehiculo::all();
            $conductores = User::all();
            $departamentos = Ubicacion::all();
            $autos = Vehiculo::all();
            $comunas = Comuna::all();
            $ocupantes = [];
            for ($i = 1; $i <= 6; $i++) {
                $campoOcupante = "OCUPANTE_" . $i;

                // Verifica si el campo OCUPANTE coincide con el ID de usuario en la solicitud
                $ocupante = $conductores->where('id', $solicitud->$campoOcupante)->first();

                // Si se encontró un ocupante válido, agrégalo al array de ocupantes
                if ($ocupante) {
                    $ocupantes[$i] = $ocupante;
                }
            }
            return view('rel_fun_veh.edit', compact('solicitud', 'tipo_vehiculos', 'vehiculos', 'ocupantes', 'departamentos', 'comunas', 'conductores', 'direcciones'));
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al cargar la solicitud, vuelva a intentarlo más tarde');
            return redirect(route('solicitud.vehiculos.index'));
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $solicitud = RelFunVeh::find($id);
            // Crear reglas específicas para la actualización
            $updateRules = [
                'ESTADO_SOL_VEH' => 'required|in:INGRESADO,SUSPENDIDO,POR AUTORIZAR,RECHAZADO',
                'FECHA_SOL_VEH' => 'nullable|string|max:255',
                'FECHA_SALIDA' => 'required|string|max:255',
                'FECHA_LLEGADA' => 'required|string|max:255',
                'HORA_SALIDA' => 'nullable|date_format:H:i',
                'HORA_LLEGADA' => 'nullable|date_format:H:i',
                'OBSERV_SOL_VEH' => 'nullable|string|max:1000',
                'PATENTE_VEHICULO' => 'required|string',
                'NOMBRE_OCUPANTES' => 'required|string|max:1000',
                'NOMBRE_SOLICITANTE' => 'sometimes|string|max:128',
                'RUT' => 'sometimes|string|max:20',
                'DEPTO' => 'sometimes|string|max:128',
                'EMAIL' => 'sometimes|string|email|max:128',
                'ID_TIPO_VEH' => 'sometimes|integer',
            ];

            $messages = [
                'required' => 'El campo :attribute es obligatorio.',
                'in' => 'El campo :attribute debe ser uno de los siguientes valores: :values',
                'string' => 'El campo :attribute debe ser una cadena de texto.',
                'max' => 'El campo :attribute no debe exceder :max caracteres.',
                'email' => 'El campo :attribute debe ser una dirección de correo válida.',
                'date_format' => 'El campo :attribute debe tener el formato HH:mm',
            ];

            //!! VERIFICAR SI ESTA EN "POR RENDIR"
            //!! LEER FIRMA Y GUARDAR AQUI (SI es el conductor designado, si la firma es nula y si el estado es por rendir)
            //!! Crear un try-catch que se encarge de notificar el envio de la contraseña
            //!! if hay contraseña hacer el try catch, sino. pasar de ahi.
            if (auth()->user()->id == $solicitud->CONDUCTOR && $solicitud->FIRMA_CONDUCTOR == null && $solicitud->ESTADO_SOL_VEH == "POR RENDIR"){
                // $rules para el formulario de rendición de chofer
                $rules = [
                    'N_BITACORA' => 'required|integer|min:0',
                    'FECHA_LLEGADA_CONDUCTOR' => 'required|string|max:255',
                    'ABS_BENCINA' => 'required|in:SI,NO',
                    'NIVEL_TANQUE' => 'required|in:BAJO,MEDIO BAJO,MEDIO,MEDIO ALTO,ALTO',
                    'KMS_INICIAL' => 'required|integer|min:0|max:1000000',
                    'KMS_FINAL' => 'required|integer|min:0|max:1000000',
                ];
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    // Redirige al usuario a la página anterior si la validación falla
                    return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                try{
                    $firmaRealizada = false; // Usamos esta variable para verificar si se ha realizado una firma

                    if(!Hash::check(request('password'), Auth::user()->password)){
                        return Redirect::back()->with('error','La contraseña proporcionada no es correcta');
                    }

                    //Guardamos la firma en el campo FIRMA_CONDUCTOR.
                    $solicitud->FIRMA_CONDUCTOR = auth()->user()->RUT . ' ' . auth()->user()->NOMBRES . ' ' . auth()->user()->APELLIDOS;
                    $firmaRealizada = true;

                    //Si no se hizo la firma por x motivo
                    if (!$firmaRealizada) {
                        return redirect()->route('solicitud.vehiculos.autorizar')->with('error', 'Esta solicitud ya ha sido firmada por ti');
                    }

                    //Actualizando los demás campos enviados en la request.
                    $data = $request->except('_token', 'password'); // Excluimos el token y la contraseña, ya que estos campos no se deben guardar.
                    $solicitud->update($data);

                    if($solicitud->FIRMA_CONDUCTOR != null && $solicitud->ESTADO_SOL_VEH == "POR RENDIR"){
                        $solicitud->ESTADO_SOL_VEH = 'TERMINADO';
                        $solicitud->save();
                        return redirect()->route('solicitud.vehiculos.index')->with('success', 'Firma realizada con éxito, solicitud terminada y datos actualizados.');
                    }
                }catch(\Exception $e){
                    session()->flash('error','Hubo un error al actualizar la solicitud o ingresar la firma, vuelva a intentarlo mas tarde');
                    return redirect(route('solicitud.vehiculos.index'));
                }
            }
            //** Validar informacion para actualizar despues de verificar si esta en rendicion */
            $validator = Validator::make($request->all(), $updateRules, $messages);

            if ($validator->fails()) {
                // Redirige al usuario a la página anterior si la validación falla
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            //*ACTUALIZAR REGISTRO */
            $data = $request->except('_token');
            $solicitud->update($data);
            session()->flash('success','La solicitud se ha actualizado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al actualizar la solicitud, vuelva a intentarlo mas tarde');
        }
        return redirect(route('solicitud.vehiculos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $solicitud = RelFunVeh::find($id);
            $solicitud->delete();
            session()->flash('success','La solicitud se ha eliminado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al eliminar la solicitud, vuelva a intentarlo mas tarde');
        }
        return redirect(route('solicitud.vehiculos.index'));
    }
    //**Logica para el envio de las firmas y verificaciones */
    public function autorizar($id)
    {
        //Buscar la solicitud
        $solicitud = RelFunVeh::findOrFail($id);

        // Verificar la contraseña del usuario
        if (!Hash::check(request('password'), Auth::user()->password)) {
            return Redirect::back()->with('error', 'La contraseña proporcionada no es correcta');
        }

        //Armar la firma del usuario
        $firmaUsuario = auth()->user()->RUT . ' ' . auth()->user()->NOMBRES . ' ' . auth()->user()->APELLIDOS;
        //Auxiliar. Para verificar si se realizó alguna firma
        $firmasRealizadas = 0;

        // Aplicar firmas según las reglas establecidas
        $firmasRealizadas += $this->realizarFirmaJefe($solicitud, $firmaUsuario);
        $firmasRealizadas += $this->realizarFirmaAdministrador($solicitud, $firmaUsuario);

        // Comprobar si se realizó alguna firma
        if ($firmasRealizadas == 0) {
            return redirect()->route('solicitud.vehiculos.autorizar')->with('error', 'Esta solicitud ya ha sido firmada por ti en todas las capacidades posibles.');
        }

        // Verificar si todas las firmas requeridas están completas
        if ($this->verificarFirmasCompletas($solicitud)) {
            $solicitud->ESTADO_SOL_VEH = 'POR RENDIR';
        }

        $solicitud->save();
        return redirect()->route('solicitud.vehiculos.autorizar')->with('success', 'Firma(s) realizada(s) con éxito');
    }

    private function realizarFirmaJefe($solicitud, $firmaUsuario)
    {
        if (auth()->user()->cargo->CARGO == 'JEFE DE DEPARTAMENTO DE ADMINISTRACION' && $solicitud->FIRMA_JEFE_ADMINISTRACION == null) {
            $solicitud->FIRMA_JEFE_ADMINISTRACION = $firmaUsuario;
            return 1;
        }
        return 0;
    }

    private function realizarFirmaAdministrador($solicitud, $firmaUsuario)
    {
        if (auth()->user()->hasRole('ADMINISTRADOR') //Tiene el rol administrador
            && $solicitud->FIRMA_ADMINISTRADOR == null) {
            $solicitud->FIRMA_ADMINISTRADOR = $firmaUsuario;
            return 1;
        }
        return 0;
    }

    private function verificarFirmasCompletas($solicitud)
    {
        // Verificar si las firmas requeridas están completas
        return $solicitud->FIRMA_JEFE_ADMINISTRACION != null && $solicitud->FIRMA_ADMINISTRADOR != null;
    }

    public function rechazar($id)
    {
        $solicitud = RelFunVeh::findOrFail($id);
        $solicitud->ESTADO_SOL_VEH = 'RECHAZADO';
        $solicitud->save();

        return redirect()->route('solicitud.vehiculos.index');
    }

    //!!PARA ESTAS FUNCIONES REUTILIZAREMOS LA VISTA INDEX, SOLO QUE LOS DATOS ESTARAN FILTRADOS SEGUN EL ESTADO
    //*INDEX POR AUTORIZAR */
    public function indexAutorizar(){
        try{
            $user = auth()->user(); // Obtener el usuario autenticado

            $query = RelFunVeh::with(['comunaOrigen', 'comunaDestino'])
                ->where('ESTADO_SOL_VEH', 'POR AUTORIZAR');

            if($user->hasRole(['ADMINISTRADOR', 'SERVICIOS'])) {
                // Si es administrador o servicios, muestra todas las solicitudes con ese estado
            } else {
                // Si no, muestra sólo las solicitudes en las que participa como ocupante
                $query->where(function($q) use ($user) {
                    $q->where('CONDUCTOR', $user->id)
                      ->orWhere('OCUPANTE_1', $user->id)
                      ->orWhere('OCUPANTE_2', $user->id)
                      ->orWhere('OCUPANTE_3', $user->id)
                      ->orWhere('OCUPANTE_4', $user->id)
                      ->orWhere('OCUPANTE_5', $user->id)
                      ->orWhere('OCUPANTE_6', $user->id);
                });
            }

            $solicitudes = $query->get();

            if($solicitudes->isEmpty()) {
                return redirect()->route('solicitud.vehiculos.index')->with('info', 'Por ahora no hay autorizaciones pendientes.');
            }

            return view('rel_fun_veh.autorizar', compact('solicitudes'));
        } catch(Exception $e){
            // manejo de excepción
            // Sería bueno agregar un log o una respuesta para que sepas qué error ocurrió
            return redirect()->route('solicitud.vehiculos.index')->with('error', 'Ha ocurrido un error inesperado.');
        }
    }




    //!!INDEX POR RENDIR
    public function indexRendir() {
        try {
            $user = Auth::user();

            // Creas el constructor de la consulta básica con el estado 'POR RENDIR'
            $query = RelFunVeh::where('ESTADO_SOL_VEH', 'POR RENDIR');

            // Filtrar para que cualquier usuario pueda ver sus propias solicitudes por rendir
            // Además, si es un conductor, podrá ver también las solicitudes donde él es el conductor
            $query->where(function($q) use ($user) {
                $q->where('ID_USUARIO', $user->id)
                  ->orWhere('CONDUCTOR', $user->id);
            });

            $solicitudes = $query->get();

            return view('rel_fun_veh.rendir', compact('solicitudes'));
        } catch (Exception $e) {
            // Manejar la excepción aquí
            Log::error('Error al obtener las solicitudes por rendir: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al obtener las solicitudes por rendir.');
        }
    }


    //!!RENDICION DEL CHOFER
    //!!AQUI ENVIAR LA FIRMA DEL CONDUCTOR
    public function rendicion(string $id)
    {
        try {
            $solicitud = RelFunVeh::find($id);
            $direcciones = DireccionRegional::all();
            $vehiculos = Vehiculo::all();
            $tipo_vehiculos = TipoVehiculo::all();
            $conductores = User::all();
            $departamentos = Ubicacion::all();
            $autos = Vehiculo::all();
            $comunas = Comuna::all();
            $ocupantes = [];
            for ($i = 1; $i <= 6; $i++) {
                $campoOcupante = "OCUPANTE_" . $i;

                // Verifica si el campo OCUPANTE coincide con el ID de usuario en la solicitud
                $ocupante = $conductores->where('id', $solicitud->$campoOcupante)->first();

                // Si se encontró un ocupante válido, agrégalo al array de ocupantes
                if ($ocupante) {
                    $ocupantes[$i] = $ocupante;
                }
            }
            return view('rel_fun_veh.formRendir', compact('solicitud', 'tipo_vehiculos', 'vehiculos', 'ocupantes', 'departamentos', 'comunas', 'conductores', 'direcciones'));
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al cargar la solicitud, vuelva a intentarlo más tarde');
            return redirect(route('solicitud.vehiculos.index'));
        }
    }
    //!!METODO "STREAM (ver preview antes de descargar)"
    public function generarPDF(Request $request, $id)
    {
        //Obtencion de informacion relevante
        $solicitud = RelFunVeh::findOrFail($id);
        $solicitante = User::findOrFail($solicitud->ID_USUARIO);
        $comuna_destino = Comuna::findOrFail($solicitud->DESTINO);
        //Datos con pardon
        $ocupante_1 = User::find($solicitud->OCUPANTE_1);
        $ocupante_2 = User::find($solicitud->OCUPANTE_2);
        $ocupante_3 = User::find($solicitud->OCUPANTE_3);
        $ocupante_4 = User::find($solicitud->OCUPANTE_4);
        $ocupante_5 = User::find($solicitud->OCUPANTE_5);
        $ocupante_6 = User::find($solicitud->OCUPANTE_6);

        // Asumiendo que $solicitud->FECHA_SALIDA y $solicitud->FECHA_LLEGADA_CONDUCTOR son instancias de Carbon (o una fecha en formato Y-m-d H:i:s)
        $horasDiferencia = null;

        if ($solicitud->FECHA_SALIDA != NULL && $solicitud->FECHA_LLEGADA_CONDUCTOR != NULL) {
            $fechaSalida = new \Carbon\Carbon($solicitud->FECHA_SALIDA);
            $fechaLlegadaConductor = new \Carbon\Carbon($solicitud->FECHA_LLEGADA_CONDUCTOR);
            $horasDiferencia = $fechaSalida->diffInHours($fechaLlegadaConductor);
        }

        $fecha = Carbon::now()->format('d-m-Y_H-i');

        $pdf = new Dompdf();
        $pdf->loadHtml(view('rel_fun_veh.hojaSalida', compact('solicitud', 'comuna_destino', 'solicitante','ocupante_1', 'ocupante_2', 'ocupante_3', 'ocupante_4', 'ocupante_5', 'ocupante_6', 'fecha','horasDiferencia'))->render());
        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        $nombreArchivo = $fecha . '_solicitud_vehicular.pdf';
        $nombreArchivo = str_replace('/', '_', $nombreArchivo);
        $nombreArchivo = str_replace('\\', '_', $nombreArchivo);

        return Response::stream(function () use ($pdf) {
            echo $pdf->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$nombreArchivo.'"'
        ]);
    }

}
