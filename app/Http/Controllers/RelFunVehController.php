<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelFunVeh;
use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\User;
use App\Models\Ubicacion;
use App\Models\Comuna;
use App\Models\Departamento;
use App\Models\Region;
use App\Models\DireccionRegional;
use Illuminate\Support\Facades\Validator;

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
        $departamentos = Departamento::all();
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        $ubicaciones = Ubicacion::all();
        $comunas = Comuna::all();
        return view('rel_fun_veh.create', compact('vehiculos','tipo_vehiculos','usuarios','departamentos','regiones','direcciones','ubicaciones','comunas'));
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
}
