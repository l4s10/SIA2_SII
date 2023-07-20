<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudSala;
use App\Models\Sala;
use App\Models\CategoriaSala;
use App\Models\Equipo;
use App\Models\TipoEquipo;
//Para formatear fechas
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SolicitudSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'checkRelFunWithSupportPermissions']);
        
    }
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'INFORMATICA'])) {
            $solicitudes = SolicitudSala::all();
        } else {
            $solicitudes = SolicitudSala::where('ID_USUARIO', $user->id)->get();
        }

        return view('reservas.reservasalas.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //*Listamos todas las salas, categorias y tipos de equipos*/
        $salas = Sala::all();
        $categorias = CategoriaSala::all();
        $tipos = TipoEquipo::all();
        return view('reservas.reservasalas.create',compact('categorias','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Llamamos a las reglas y validaciones desde el modelo SolicitudSala.php
        $request->validate(SolicitudSala::$rules,SolicitudSala::$messages);
        $data = $request->except('_token');

        // $fecha = Carbon::createFromFormat('d-m-Y', $request['FECHA_SOL_SALA'])->format('Y-m-d');
        // $data['FECHA_SOL_SALA'] = $fecha;
        // $rut = intval(str_replace(['.', '-'], '', $request['RUT']));
        // $data['RUT'] = $this->formatRut($rut);
        try{
            SolicitudSala::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect(route('reservas.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $solicitud = SolicitudSala::find($id);
        return view('reservas.reservasalas.show',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitud = SolicitudSala::find($id);
        $equipos = Equipo::all();
        $salas = Sala::all();
        $categorias = CategoriaSala::all();
        $tipos = TipoEquipo::all();
        return view('reservas.reservasalas.edit',compact('solicitud','equipos','salas','categorias','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $solicitud = SolicitudSala::find($id);
        $data = $request->validate(SolicitudSala::$rules,SolicitudSala::$messages);
        try{
            $solicitud->update($data);
            session()->flash('success','La solicitud se ha modificado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al modificar la solicitud, vuelva a intentarlo más tarde.');
        }
        return redirect(route('reservas.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = SolicitudSala::find($id);
        try{
            $request->delete();
            session()->flash('success','La solicitud se ha eliminado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la solicitud seleccionada, vuelva a intentarlo más tarde');
        }
        return redirect(route('reservas.dashboard'));
    }
    public function getAllSolicitudes()
    {
        $solicitudes = SolicitudSala::all();
        return response()->json($solicitudes);
    }

    public function getSolicitudesByDates(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $solicitudes = SolicitudSala::whereBetween('FECHA_SOL_SALA', [$startDate, $endDate])->get();
        return response()->json($solicitudes);
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
