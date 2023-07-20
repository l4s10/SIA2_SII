<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\SolicitudEquipos;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
//Para formatear fechas
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class SolicitudEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct()
    {
        $this->middleware(['auth', 'checkRelFunWithSupportPermissions']);
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'INFORMATICA'])) {
            $solicitudes = SolicitudEquipos::all();
        } else {
            $solicitudes = SolicitudEquipos::where('ID_USUARIO', $user->id)->get();
        }

        return view('solicitudequipos.index', compact('solicitudes'));
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
        $validator = Validator::make($request->all(), SolicitudEquipos::$rules, SolicitudEquipos::$messages);

        if ($validator->fails()) {
            return redirect(route('solequipos.create'))
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $data = $request->all(); // Obtener los datos del formulario
            SolicitudEquipos::create($data);
            session()->flash('success','La solicitud de equipo ha sido enviada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al enviar la solicitud, vuelva a enviarlo más tarde.');
        }
        return redirect(route('solequipos.index'));
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
    public function edit(string $id)
    {
        $solicitud = SolicitudEquipos::find($id);
        $equipos = Equipo::all();
        $tipos = TipoEquipo::all();
        return view('solicitudequipos.edit',compact('solicitud','equipos','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), SolicitudEquipos::$rules, SolicitudEquipos::$messages);
        //EN CASO DE QUE FALLE LA VALIDACION SE REGRESA AL FORMULARIO CON LOS MENSAJES DE ERROR Y LOS INPUTS PREVIOS
        if ($validator->fails()) {
            return redirect(route('solequipos.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $solicitud = SolicitudEquipos::findOrFail($id);
            $data = $request->all();
            $solicitud->update($data);
            session()->flash('success', 'La solicitud de equipo ha sido actualizada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al actualizar la solicitud, vuelva a intentarlo más tarde.');
        }

        return redirect(route('solequipos.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = SolicitudEquipos::find($id);
        try{
            $request->delete();
            session()->flash('success','La solicitud de equipo se eliminó exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la solicitud seleccionada');
        }
        return redirect(route('solequipos.index'));
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
