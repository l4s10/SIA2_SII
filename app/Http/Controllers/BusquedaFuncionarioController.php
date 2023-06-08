<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cargo;

use Illuminate\Http\Request;

class BusquedaFuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = User::all();
        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.index',compact('funcionarios','cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $funcionarios = User::all();
        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.create',compact('funcionarios','cargos'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
