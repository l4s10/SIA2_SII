<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use App\Models\Resolucion;
use App\Models\User;

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
            $query = Resolucion::whereHas('delegado.users', function ($query) use ($nombres, $apellidos) {
                $query->where('NOMBRES', $nombres)
                    ->where('APELLIDOS', $apellidos);
            });
            $resoluciones = $query->with('tipo', 'firmante', 'delegado', 'facultad')->distinct()->get();

            if ($resoluciones->isNotEmpty()) {
                $user = $resoluciones->first()->delegado->users->first();
                if ($user) {
                    $cargoFuncionario = $user->cargo->CARGO;
                }
            }
        }elseif ($idCargo) {
            //$resoluciones = Resolucion::where('ID_DELEGADO', $idCargo)->get();
            $resoluciones = Resolucion::whereHas('delegado', function ($query) use ($idCargo) {
                $query->where('ID_CARGO', $idCargo);
            })->with('tipo', 'firmante', 'delegado', 'facultad')->get();
            $cargoFuncionario = Cargo::where('ID_CARGO', $idCargo)->value('CARGO');
        }

        $cargos = Cargo::all();
        return view('directivos.busquedafuncionario.index', compact('resoluciones', 'cargos', 'nombres', 'apellidos','cargoFuncionario'));
    }

    public function buscarFuncionarios(Request $request)
    {
        // Obtiene los valores de nombres y apellidos desde la solicitud AJAX
        $nombres = strtolower($request->input('nombres'));
        $apellidos = strtolower($request->input('apellidos'));

        // Verifica los casos específicos para retornar los funcionarios
        if (!empty($nombres) && !empty($apellidos)) {
            // Realizar la búsqueda de funcionarios en la base de datos según los nombres y apellidos registrados, respetando el orden de sus caracteres 
            $funcionarios = User::whereRaw("LOWER(NOMBRES) LIKE ? AND LOWER(APELLIDOS) LIKE ?", ["$nombres%", "$apellidos%"])
                ->get();
        } elseif (!empty($nombres)) {
            // Realizar la búsqueda de funcionarios en la base de datos solo por nombres
            $funcionarios = User::whereRaw("LOWER(NOMBRES) LIKE ?", ["$nombres%"])
                ->get();
        } elseif (!empty($apellidos)) {
            // Realizar la búsqueda de funcionarios en la base de datos solo por apellidos
            $funcionarios = User::whereRaw("LOWER(APELLIDOS) LIKE ?", ["$apellidos%"])
                ->get();
        } else {
            // No se proporcionaron nombres ni apellidos, retornar una respuesta vacía
            return response()->json([]);
        }

        // Retorna los resultados de búsqueda en formato JSON
        return response()->json($funcionarios);
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