<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cargo;
use App\Models\TipoResolucion;
use App\Models\Facultad;
use App\Models\Resolucion;

use Illuminate\Http\Request;

class BusquedaAvanzadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Obtiene todas las resoluciones delegatorias con sus atributos.
    public function index(Request $request)
    {
        $tipos = TipoResolucion::distinct()->get(['ID_TIPO', 'NOMBRE']);
        $facultades = Facultad::all();
        $delegados = Cargo::distinct()->get(['ID_CARGO', 'CARGO']);
        $firmantes = Cargo::distinct()->get(['ID_CARGO', 'CARGO']);
        $fechas = Resolucion::distinct()->get(['FECHA']);
        $nros = Resolucion::distinct()->get(['NRO_RESOLUCION']);
        //$leys = Facultad::distinct()->get(['ID_FACULTAD', 'LEY_ASOCIADA']);
        //$arts = Facultad::distinct()->get(['ID_FACULTAD', 'ART_LEY_ASOCIADA']);


        $tiposReq = $request->input('ID_TIPO');
        $facultadesReq = $request->input('ID_FACULTAD');
        $delegadosReq = $request->input('ID_DELEGADO');
        $firmantesReq = $request->input('ID_FIRMANTE');
        $fechasReq = $request->input('FECHA');
        $nrosReq = $request->input('NRO_RESOLUCION');
        $leyReq = $request->input('ID_LEY');
        $artsReq = $request->input('ID_ART_LEY');


        /*$tiposReq = [];
        $facultadesReq = [];
        $delegadosReq = [];
        $firmantesReq = [];
        $fechasReq = [];
        $nrosReq = [];*/
        $resoluciones = [];

        if ($tiposReq) {
            $resoluciones = Resolucion::where('ID_TIPO', $tiposReq)->get();
        }
        if ($facultadesReq) {
            $resoluciones = Resolucion::where('ID_FACULTAD', $facultadesReq)->get();
        }
        if ($delegadosReq) {
            $resoluciones = Resolucion::where('ID_DELEGADO', $delegadosReq)->get();
        }
        if ($firmantesReq) {
            $resoluciones = Resolucion::where('ID_FIRMANTE', $firmantesReq)->get();
        }
        if ($fechasReq) {
            $resoluciones = Resolucion::where('FECHA', $fechasReq)->get();
        }
        if ($nrosReq) {
            $resoluciones = Resolucion::where('NRO_RESOLUCION', $nrosReq)->get();
        }
        if ($artsReq) {
            $resoluciones = Resolucion::where('ID_FACULTAD', $artsReq)->get();
        }
        if ($leyReq) {
            $resoluciones = Resolucion::where('ID_FACULTAD', $leyReq)->get();
        }

        return view('directivos.busquedaavanzada.index', compact('tipos','facultades','delegados','firmantes','fechas','nros','resoluciones'));
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