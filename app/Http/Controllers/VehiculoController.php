<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\Ubicacion;
use App\Models\Departamento;
use App\Models\Region;
use App\Models\DireccionRegional;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('SERVICIOS') || $user->hasRole('INFORMATICA')) {
                return $next($request);
            } else {
                abort(403, 'Acceso no autorizado');
            }
        });
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
        $departamentos = Departamento::all();
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        return view('vehiculos.create', compact('tipos','ubicaciones','departamentos','regiones','direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $vehiculo = new Vehiculo();
            // Asignamos la entidad_type segun el input
            if ($request->entidad_type == 'Departamento') {
                $entidad_type = 'App\Models\Departamento';
            } else if ($request->entidad_type == 'Ubicacion') {
                $entidad_type = 'App\Models\Ubicacion';
            } else {
                // Aquí podrías agregar un mensaje de error o lanzar una excepción si se recibe un valor no esperado
            }
            $vehiculo->fill($request->all());
            //Asignamos manualmente el modelo al que apunta el tipo de entidad.
            $vehiculo->entidad_type = $entidad_type;
            $vehiculo->save();

            return redirect()->route('vehiculos.index')->with('success', 'El vehículo se ha creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al crear el vehículo: ');
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

        return view('vehiculos.edit', compact('vehiculo', 'tipos', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        try {
            $vehiculo->update($request->all());

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
