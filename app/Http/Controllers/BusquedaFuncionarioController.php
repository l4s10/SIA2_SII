<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Resolucion;

use Illuminate\Http\Request;

class BusquedaFuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nombres = $request->input('NOMBRES');
        $apellidos = $request->input('APELLIDOS');


        $resoluciones = Resolucion::join('users', 'users.ID_CARGO', '=', 'resoluciones.ID_CARGO')
        ->where('users.NOMBRES', $nombres)
        ->where('users.APELLIDOS', $apellidos)
        ->get();
        /*
        $resoluciones = Resolucion::whereHas('user', function ($query) use ($nombres, $apellidos) {
            $query->where('NOMBRES', $nombres)
            ->where('APELLIDOS', $apellidos);
        })->get();*/

        //dd($resoluciones);

        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.index', compact('resoluciones','cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.create', compact('cargos'));
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
