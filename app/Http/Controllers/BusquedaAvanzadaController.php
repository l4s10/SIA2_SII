<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Cargo;
use App\Models\TipoResolucion;
use App\Models\Facultad;
use App\Models\Resolucion;

use Illuminate\Http\Request;

class BusquedaAvanzadaController extends Controller
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
    //Obtiene todas las resoluciones delegatorias con sus atributos.
    public function index(Request $request)
    {
        //Atributos para la vista
        $tipos = TipoResolucion::distinct()->get(['ID_TIPO', 'NOMBRE']);
        $facultades = Facultad::all();
        $delegados = Cargo::pluck('CARGO', 'ID_CARGO');
        $firmantes = Cargo::pluck('CARGO', 'ID_CARGO');
        $fechas = Resolucion::distinct()->get(['FECHA']);
        $nros = Resolucion::distinct()->get(['NRO_RESOLUCION']);
        
        // Obtengo '0' resoluciones, entonces, no muestro tabla en la vista
        $resoluciones = [];

        if ($request->has('buscar')) {
            // Llamar a la función buscarResoluciones solo si se presionó el botón "Buscar"
            $resoluciones = $this->buscarResoluciones($request);
        }
        return view('directivos.busquedaavanzada.index', compact('tipos', 'facultades', 'delegados', 'firmantes', 'fechas', 'nros', 'resoluciones'));
    }

    public function buscarResoluciones(Request $request){
        //Request de la vista
        $tiposReq = $request->input('ID_TIPO');
        $facultadesReq = $request->input('ID_FACULTAD');
        $delegadosReq = $request->input('ID_DELEGADO');
        $firmantesReq = $request->input('ID_FIRMANTE');
        $fechasReq = $request->input('FECHA');
        $nrosReq = $request->input('NRO_RESOLUCION');
        $leyReq = $request->input('LEY_ASOCIADA');
        $artsReq = $request->input('ART_LEY_ASOCIADA');
        
        // Obtiene todos los checkboxes de seleciconados en la vista
        $selectedFilters = $request->input('selectedFilters');


        //Valido que dado cualquier selección en estos inputs desencadene la búesqueda de resoluciones en función de sus respectivos checkboxes
        if($tiposReq || $facultadesReq || $delegadosReq || $firmantesReq || $fechasReq || $nrosReq || $leyReq || $artsReq){
            $resoluciones = Resolucion::query();
            
            if ($tiposReq && isset($selectedFilters['ID_TIPO'])) {
                $resoluciones->where('ID_TIPO', $tiposReq);
            }
            if ($facultadesReq && isset($selectedFilters['ID_FACULTAD'])) {
                $resoluciones->where('ID_FACULTAD', $facultadesReq);
            }
            if ($delegadosReq && isset($selectedFilters['ID_DELEGADO'])) {
                $resoluciones->where('ID_DELEGADO', $delegadosReq);
            }
            if ($firmantesReq && isset($selectedFilters['ID_FIRMANTE'])) {
                $resoluciones->where('ID_FIRMANTE', $firmantesReq);
            }
            if ($fechasReq && isset($selectedFilters['FECHA'])) {
                $resoluciones->where('FECHA', $fechasReq);
            }
            if ($nrosReq && isset($selectedFilters['NRO_RESOLUCION'])) {
                $resoluciones->where('NRO_RESOLUCION', $nrosReq);
            }
            if ($artsReq && isset($selectedFilters['ART_LEY_ASOCIADA'])) {
                $resoluciones->where('ID_FACULTAD', $artsReq);
            }
            if ($leyReq && isset($selectedFilters['LEY_ASOCIADA'])) {
                $resoluciones->where('ID_FACULTAD', $leyReq);
            }
            //Obtengo colección de resoluciones según parámetros de búsqueda
            $resoluciones = $resoluciones->distinct()->get();
            return $resoluciones;
        }else{
            return $resoluciones = [];
        }
    }
}
