<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Models\Cargo;
use App\Models\Resolucion;
use App\Models\User;
use App\Models\DireccionRegional;

use Illuminate\Http\Request;

class BusquedaFuncionarioController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('JURIDICO') || $user->hasRole('INFORMATICA')) {
                return $next($request);
            } else {
                abort(403, 'Acceso no autorizado');
            }
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Parámetros de control
        $busquedaResolucionCargo = null;
        $busquedaResolucionCargoFallida = null;
        $busquedaResolucionFuncionario = null;
        $busquedaResolucionFuncionarioFallida = null;

        //inputs importados desde la vista para busqueda por datos y cargos
        $nombres = $request->input('NOMBRES');
        $apellidos = $request->input('APELLIDOS');
        $rut = $request->input('RUT');
        $idCargoFuncionario = $request->input('ID_CARGO');
        //id del Cargo delegado de la resolución 
        $idCargo = $request->input('ID_DELEGADO');
        
        //Parámetros compactados a la vista
        $resoluciones = [];
        $cargoFuncionario = null; // Valor predeterminado
        $cargoResolucion = null;
        $rutRes = null;

        if ($nombres && $apellidos && $rut && $idCargoFuncionario) {
            $query = Resolucion::whereHas('delegado.users', function ($query) use ($nombres, $apellidos, $rut, $idCargoFuncionario) {
                $query->where('NOMBRES', $nombres)
                    ->where('APELLIDOS', $apellidos)
                    ->where('RUT', $rut)
                    ->where('ID_CARGO',$idCargoFuncionario);
            });
            $resoluciones = $query->with('tipo', 'firmante', 'delegado', 'facultad')->get();

            if ($resoluciones->isNotEmpty()) {
                $user = $resoluciones->first()->delegado->users->first();
                if ($user) {
                    //Parámetros del funcionario seleccionado para realizar búsqueda de sus resoluciones
                    $cargoFuncionario = $user->cargo->CARGO;
                    $rutRes = $user->RUT;
                }
                $busquedaResolucionFuncionario = true;
            }else{
                $user = User::where('ID_CARGO',$idCargoFuncionario)->first();
                $cargoFuncionario = $user->cargo->CARGO;
                $rutRes = $user->RUT;
                $busquedaResolucionFuncionarioFallida = true;
            }    
        }elseif ($idCargo) {
            //$resoluciones = Resolucion::where('ID_DELEGADO', $idCargo)->get();
            $query = Resolucion::whereHas('delegado', function ($query) use ($idCargo) {
                $query->where('ID_CARGO', $idCargo);
            });
            $resoluciones = $query->with('tipo', 'firmante', 'delegado', 'facultad')->get();
            
            if ($resoluciones->isNotEmpty()) {
                $cargoResolucion = $resoluciones->first()->delegado->CARGO;
                $busquedaResolucionCargo = true;
            }else{
                $aux = Cargo::where('ID_CARGO', $idCargo)->first();
                $cargoResolucion = $aux->CARGO;
                $busquedaResolucionCargoFallida = true;
            } 
            
        }

        //Cargos asociados a la dirección regional del usuario autenticado, para ser enviados a la vista
        $exclusionCargos = ['FUNCIONARIO', 'EXTERNO']; // Cargos a excluir
        $direccionRegionalAutenticada = auth()->user()->cargo->ID_DIRECCION;
        $cargos = Cargo::where('ID_DIRECCION', $direccionRegionalAutenticada)
            ->whereNotIn('CARGO', $exclusionCargos)
            ->get();
        return view('directivos.busquedafuncionario.index', compact('resoluciones', 'cargos','nombres', 'apellidos', 'cargoFuncionario','rutRes', 'cargoResolucion','busquedaResolucionCargo','busquedaResolucionFuncionario','busquedaResolucionCargoFallida','busquedaResolucionFuncionarioFallida'));
    }

    public function buscarFuncionarios(Request $request)
    {
        // Obtener los valores de nombres, apellidos, rut e idCargo desde la solicitud AJAX
        $nombres = strtolower($request->input('nombres'));
        $apellidos = strtolower($request->input('apellidos'));
        $rut = strtolower($request->input('rut'));
        $idCargoFuncionario = $request->input('idCargoFuncionario');

        // Realizar la búsqueda de funcionarios según los nombres, apellidos, rut y cargo registrados
        $funcionarios = User::query();

        if (!empty($nombres)) {
            $funcionarios->where('NOMBRES', 'LIKE', strtolower($nombres) . '%');
        }

        if (!empty($apellidos)) {
            $funcionarios->where('APELLIDOS', 'LIKE', strtolower($apellidos) . '%');
        }

        if (!empty($rut)) {
            $funcionarios->where('RUT', 'LIKE', strtolower($rut) . '%');
        }

        $direccionRegionalAutenticada = auth()->user()->cargo->ID_DIRECCION; // dirección regional sesión autenticada
        // Cargos a excluir de la búsqueda: ['FUNCIONARIO', 'EXTERNO']; 

        // Función callback para aplicar condición de filtro al obtener colección de funcionarios
        $funcionarios = $funcionarios->whereHas('cargo', function ($query) {
            $query->whereNotIn('CARGO', ['FUNCIONARIO', 'EXTERNO']);
        })->whereHas('cargo.direccion', function ($query) use ($direccionRegionalAutenticada) {
            $query->where('ID_DIRECCION', $direccionRegionalAutenticada);
        });

        if (!empty($idCargoFuncionario)) {
            $funcionarios->where('ID_CARGO', $idCargoFuncionario);
        }

        //Obtención de colección de posibles funcionarios
        $funcionarios = $funcionarios->get();

        // Validación para controlar el mensaje de error de búsqueda de resoluciones
        // Luego cargamos la nueva variable "busquedaAjax"
        session()->put('busquedaAjax', true);
        // Retorna los resultados de búsqueda en formato JSON
        return response()->json($funcionarios);
    }

   
}