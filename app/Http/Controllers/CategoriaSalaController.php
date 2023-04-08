<?php

namespace App\Http\Controllers;

use App\Models\CategoriaSala;
use Illuminate\Http\Request;

class CategoriaSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Buscar categorias existentes en la tabla
        $categorias = CategoriaSala::all();
        //Se retorna la vista con las categorias recuperadas
        return view('categoriasalas.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaSala $categoriaSala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaSala $categoriaSala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriaSala $categoriaSala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaSala $categoriaSala)
    {
        //
    }
}
