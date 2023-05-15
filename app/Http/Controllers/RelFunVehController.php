<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelFunVeh;
use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\User;
use App\Models\Departamento;

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
        $conductores = User::all();
        $departamentos = Departamento::all();
        return view('rel_fun_veh.create', compact('vehiculos','tipo_vehiculos','departamentos','conductores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*Guardar solicitud
        try{
            $request->validate(RelFunVeh::rules(), RelFunVeh::messages());
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
        try{
            $vehiculos = Vehiculo::all();
            $tipo_vehiculos = TipoVehiculo::all();
            $conductores = User::all();
            $departamentos = Departamento::all();
            $solicitud = RelFunVeh::find($id);
            return view('rel_fun_veh.edit',compact('solicitud','tipo_vehiculos','vehiculos','conductores','departamentos'));
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al cargar la solicitud, vuelva a intentarlo mas tarde');
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
            $request->validate(RelFunVeh::rules(), RelFunVeh::messages());
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
}
