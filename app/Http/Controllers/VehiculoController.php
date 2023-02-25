<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct(){
        $this->middleware('auth');
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
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->except('_token');
        // Vehiculo::create($data);
        // return redirect('/vehiculos');

        $vehiculos = new Vehiculo();
        $vehiculos->PATENTE_VEHICULO = $request->get('PATENTE_VEHICULO');
        $vehiculos->TIPO_VEHICULO = $request->get('TIPO_VEHICULO');
        $vehiculos->MARCA = $request->get('MARCA');
        $vehiculos->MODELO_VEHICULO = $request->get('MODELO_VEHICULO');
        $vehiculos->ANO_VEHICULO = $request->get('ANO_VEHICULO');
        $vehiculos->UNIDAD_VEHICULO = $request->get('UNIDAD_VEHICULO');
        $vehiculos->ESTADO_VEHICULO = $request->get('ESTADO_VEHICULO');
        //Una vez seteados, guardamos con la siguiente instruccion.
        $vehiculos->save();
        return redirect('/vehiculos');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();

        if (Vehiculo::count() === 0) {
            Vehiculo::truncate();
        }

        return redirect('/vehiculos');
    }
}
