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
        //inputs importados desde la vista para busqueda por datos y cargos
        $nombres = $request->input('NOMBRES');
        $apellidos = $request->input('APELLIDOS');
        $idCargo = $request->input('ID_DELEGADO');

        //$resoluciones = Resolucion::join('users', 'users.ID_CARGO', '=', 'resoluciones.ID_DELEGADO')


        //$query = Resolucion::join('users', 'users.ID_CARGO', '=', 'resoluciones.ID_DELEGADO');
        $resoluciones = [];
        $cargoFuncionario = null; // Valor predeterminado

        if ($nombres && $apellidos) {
            $query = Resolucion::join('users', 'users.ID_CARGO', '=', 'resoluciones.ID_DELEGADO')
                ->where('users.NOMBRES', $nombres)
                ->where('users.APELLIDOS', $apellidos);

            $resoluciones = $query->distinct()->get();

            if ($resoluciones->isNotEmpty()) {
                $user = $resoluciones->first()->delegado->users->first();
                if ($user) {
                    $cargoFuncionario = $user->cargo->CARGO;
                }
            }
        }elseif ($idCargo) {
            //$resoluciones = Resolucion::where('ID_DELEGADO', $idCargo)->get();
            $resoluciones = Resolucion::with('tipo', 'firmante', 'delegado', 'facultad')
            ->where('ID_DELEGADO', $idCargo)
            ->get();
            $cargoFuncionario = Cargo::find($idCargo)->CARGO;
        }

        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.index', compact('resoluciones', 'cargos', 'nombres', 'apellidos','cargoFuncionario'));
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