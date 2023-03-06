<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct(){
        $this->middleware('auth');

    }

    public function index()
    {
        $tipos = TipoMaterial::all();
        return view('tipomaterial.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipomaterial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        TipoMaterial::create($data);
        return redirect('/tipomaterial');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMaterial $tipoMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo = TipoMaterial::find($id);
        return view('tipomaterial.edit')->with('tipo',$tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo = TipoMaterial::find($id);
        $tipo->update($request->all());
        return redirect('/tipomaterial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = TipoMaterial::find($id);
        $tipo->delete();
        return redirect('/tipomaterial');
    }
}
