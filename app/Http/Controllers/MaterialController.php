<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importamos el modelo de Material
use App\Models\Material;

class MaterialController extends Controller
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
        //Funcion que lista elementos de la tabla de la BDD.
        $materiales = Material::all();
        return view('materiales.index',compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materiales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Creamos una instancia de articulos, y vamos seteando valores segun lo obtenido del request (al dar click en boton submit).
        // $materiales = new Material();
        // $materiales->ID_MATERIAL = $request->get('ID_MATERIAL');
        // $materiales->NOMBRE_MATERIAL = $request->get('NOMBRE_MATERIAL');
        // $materiales->TIPO_MATERIAL = $request->get('TIPO_MATERIAL');
        // $materiales->CANTIDAD = 0;
        //Una vez seteados, guardamos con la siguiente instruccion.
        // $materiales->save();

        $data = $request->except('_token');
        Material::create($data);
        return  redirect('/materiales');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $material = Material::find($id);
        return view('materiales.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::find($id);
        return view('materiales.edit')->with('material',$material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $material = Material::find($id);
        $material->update($request->all());
        return redirect('/materiales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::find($id);
        $material->delete();

        return redirect('/materiales');
    }
}
