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
use Illuminate\Support\Facades\Validator;

use Dompdf\Dompdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Response;

class RelFunVehController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //*Listar las solicitudes*/
        $solicitudes = RelFunVeh::all();
        return view('rel_fun_veh.index',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //*Crear solicitud
        $vehiculos = Vehiculo::all();
        $tipo_vehiculos = TipoVehiculo::all();
        $usuarios = User::all();
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        $ubicaciones = Ubicacion::all();
        $comunas = Comuna::all();
        return view('rel_fun_veh.create', compact('vehiculos','tipo_vehiculos','usuarios','regiones','direcciones','ubicaciones','comunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*Guardar solicitud
        try{
            $rules = RelFunVeh::$rules;
            $messages = RelFunVeh::$messages;

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()
                    ->route('solicitud.vehiculos.create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $data = $request->except('_token');
            RelFunVeh::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo mas tarde' . $e->getMessage());
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
            $rules = RelFunVeh::$rules;
            $messages = RelFunVeh::$messages;

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()
                    ->route('solicitud.vehiculos.create')
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
    public function autorizar($id)
    {
        $solicitud = RelFunVeh::findOrFail($id);
        $firmaRealizada = false; // Usamos esta variable para verificar si se ha realizado una firma

        // Caso conductor (ASIGNACION POR FORMULARIO)
        if (auth()->user()->id == $solicitud->CONDUCTOR && $solicitud->FIRMA_CONDUCTOR == null){
            $solicitud->FIRMA_CONDUCTOR = auth()->user()->RUT . ' ' . auth()->user()->NOMBRES . ' ' . auth()->user()->APELLIDOS;
            $firmaRealizada = true;
        }

        // Caso cargo 'JEFE DE DEPARTAMENTO ADMINISTRACION' - Damos prioridad a este rol
        if (!$firmaRealizada && auth()->user()->cargo->CARGO == 'JEFE DE DEPARTAMENTO DE ADMINISTRACION' && $solicitud->FIRMA_JEFE_ADMINISTRACION == null) {
            $solicitud->FIRMA_JEFE_ADMINISTRACION = auth()->user()->RUT . ' ' . auth()->user()->NOMBRES . ' ' . auth()->user()->APELLIDOS;
            $firmaRealizada = true;
        }

        // Caso administrador (ROLES) - Solo se llegará aquí si el usuario no es un 'JEFE DE DEPARTAMENTO DE ADMINISTRACION' o si ya se ha firmado en esa capacidad
        if (!$firmaRealizada && auth()->user()->hasRole('ADMINISTRADOR') && $solicitud->FIRMA_ADMINISTRADOR == null) {
            $solicitud->FIRMA_ADMINISTRADOR = auth()->user()->RUT . ' ' . auth()->user()->NOMBRES . ' ' . auth()->user()->APELLIDOS;
            $firmaRealizada = true;
        }

        if (!$firmaRealizada) {
            // Si no se ha realizado ninguna firma, significa que ya se firmó en todas las capacidades posibles
            return redirect()->route('solicitud.vehiculos.autorizar')->with('error', 'Esta solicitud ya ha sido firmada por ti');
        }

        // Validar si todas las firmas están presentes
        if($solicitud->FIRMA_CONDUCTOR != null && $solicitud->FIRMA_ADMINISTRADOR != null && $solicitud->FIRMA_JEFE_ADMINISTRACION != null){
            $solicitud->ESTADO_SOL_VEH = 'POR RENDIR';
            $solicitud->save();
            return redirect()->route('solicitud.vehiculos.index')->with('success', 'Firma realizada con éxito y autorizado por las 3 entidades!!');
        }

        $solicitud->save();

        return redirect()->route('solicitud.vehiculos.autorizar')->with('success', 'Firma realizada con éxito');
    }

    public function rechazar($id)
    {
        $solicitud = RelFunVeh::findOrFail($id);
        $solicitud->ESTADO_SOL_VEH = 'RECHAZADO';
        //!!MANDAR AQUI DATOS DE FIRMA
        $solicitud->save();

        return redirect()->route('solicitud.vehiculos.index');
    }

    //!!PARA ESTAS FUNCIONES REUTILIZAREMOS LA VISTA INDEX, SOLO QUE LOS DATOS ESTARAN FILTRADOS SEGUN EL ESTADO
    //*INDEX POR AUTORIZAR */
    public function indexAutorizar(){
        try{
            $solicitudes = RelFunVeh::with(['comunaOrigen', 'comunaDestino'])
                ->where('ESTADO_SOL_VEH', 'POR AUTORIZAR')->get();

            if($solicitudes->isEmpty()) {
                return redirect()->route('solicitud.vehiculos.index')->with('info', 'Por ahora no hay autorizaciones pendientes.');
            }

            return view('rel_fun_veh.autorizar', compact('solicitudes'));
        }catch(Exception $e){
            // manejo de excepción
        }
    }



    //!!INDEX POR RENDIR
    public function indexRendir(){
        try{
            $solicitudes = RelFunVeh::where('ESTADO_SOL_VEH', 'POR RENDIR')->where('ID_USUARIO', auth()->user()->id)->get();
            return view('rel_fun_veh.rendir', compact('solicitudes'));
        } catch (Exception $e){

        }
    }

    //!!RENDICION DEL CHOFER
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
            return view('rel_fun_veh.rendir', compact('solicitud', 'tipo_vehiculos', 'vehiculos', 'ocupantes', 'departamentos', 'comunas', 'conductores', 'direcciones'));
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

        $fecha = Carbon::now()->format('d-m-Y_H-i');

        $pdf = new Dompdf();
        $pdf->loadHtml(view('rel_fun_veh.hojaSalida', compact('solicitud', 'comuna_destino', 'solicitante','ocupante_1', 'ocupante_2', 'ocupante_3', 'ocupante_4', 'ocupante_5', 'ocupante_6', 'fecha'))->render());
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
