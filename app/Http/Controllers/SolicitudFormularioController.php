<?php

namespace App\Http\Controllers;

use App\Models\SolicitudFormulario;
use App\Models\Formulario;
use Illuminate\Http\Request;

class SolicitudFormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = SolicitudFormulario::all();
        return view ('solicitudformularios.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formularios = Formulario::all();
        return view('solicitudformularios.create',compact('formularios'));
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
    public function show(SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudFormulario $solicitudFormulario)
    {
        //
    }
}
