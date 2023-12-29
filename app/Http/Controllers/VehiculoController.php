<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\Ubicacion;
use App\Models\Region;
use App\Models\DireccionRegional;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware(['auth', 'roleAdminAndServices']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Listo la informacion de la tabla SQL
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index')->with('vehiculos',$vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoVehiculo::all();
        $ubicaciones = Ubicacion::all();
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        return view('vehiculos.create', compact('tipos','ubicaciones','regiones','direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'PATENTE_VEHICULO' => 'required|string|max:7',
            'ID_TIPO_VEH' => 'required|integer|exists:tipo_vehiculo,ID_TIPO_VEH',
            'MARCA' => 'required|string|max:128',
            'MODELO_VEHICULO' => 'required|string',
            'ANO_VEHICULO' => 'required|string|max:128',
            'ID_UBICACION' => 'required|integer|exists:ubicacion,ID_UBICACION',
            'ESTADO_VEHICULO' => 'required|string|max:128',
        ];

        $messages = [
            'PATENTE_VEHICULO.required' => 'El campo Patente del vehículo es requerido.',
            'ID_TIPO_VEH.required' => 'El campo ID de Tipo de Vehículo es requerido.',
            'MARCA.required' => 'El campo Marca es requerido.',
            'MODELO_VEHICULO.required' => 'El campo Modelo del vehículo es requerido.',
            'ANO_VEHICULO.required' => 'El campo Año del vehículo es requerido.',
            'ID_UBICACION.required' => 'El campo ID de Ubicación es requerido.',
            'ESTADO_VEHICULO.required' => 'El campo Estado del vehículo es requerido.',
        ];

        $request->validate($rules, $messages);
        //?? Upper case para la patente, marca y modelo.
        $request->merge([
            'PATENTE_VEHICULO' => strtoupper($request->PATENTE_VEHICULO),
            'MARCA' => strtoupper($request->MARCA),
            'MODELO_VEHICULO' => strtoupper($request->MODELO_VEHICULO),
        ]);

        try {
            $vehiculo = new Vehiculo();
            $vehiculo->fill($request->all());
            $vehiculo->save();

            return redirect()->route('vehiculos.index')->with('success', 'El vehículo se ha creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al crear el vehículo: '); // . $e->getMessage() DEBUG
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        $tipos = TipoVehiculo::all();
        $ubicaciones = Ubicacion::all();
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        return view('vehiculos.edit', compact('vehiculo', 'regiones', 'tipos', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $rules = [
            'PATENTE_VEHICULO' => 'required|string|max:7|regex:/^[A-Z]{2}[A-Z0-9]{2}[A-Z0-9]{1,2}$/',
            'ID_TIPO_VEH' => 'required|integer|exists:tipo_vehiculo,ID_TIPO_VEH',
            'MARCA' => 'required|string|max:128',
            'MODELO_VEHICULO' => 'required|string',
            'ANO_VEHICULO' => 'required|string|max:128',
            'ID_UBICACION' => 'required|integer|exists:ubicacion,ID_UBICACION',
            'ESTADO_VEHICULO' => 'required|string|max:128',
        ];

        $messages = [
            'PATENTE_VEHICULO.required' => 'El campo Patente del vehículo es requerido.',
            'ID_TIPO_VEH.required' => 'El campo ID de Tipo de Vehículo es requerido.',
            'MARCA.required' => 'El campo Marca es requerido.',
            'MODELO_VEHICULO.required' => 'El campo Modelo del vehículo es requerido.',
            'ANO_VEHICULO.required' => 'El campo Año del vehículo es requerido.',
            'ID_UBICACION.required' => 'El campo ID de Ubicación es requerido.',
            'ESTADO_VEHICULO.required' => 'El campo Estado del vehículo es requerido.',
        ];

        $request->validate($rules, $messages);

        try {
            //?? Upper case para la patente, marca y modelo.
            $request->merge([
                'PATENTE_VEHICULO' => strtoupper($request->PATENTE_VEHICULO),
                'MARCA' => strtoupper($request->MARCA),
                'MODELO_VEHICULO' => strtoupper($request->MODELO_VEHICULO),
            ]);
            $vehiculo->fill($request->all());
            $vehiculo->save();

            return redirect()->route('vehiculos.index')->with('success', 'El vehículo se ha actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el vehículo: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        try{
            $vehiculo->delete();
            session()->flash('success','El vehículo se eliminó exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el vehiculo seleccionada');
        }
        return redirect()->route('vehiculos.index');
    }
}
