<?php

namespace App\Http\Controllers;

use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class TipoEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');

    }
    public function index()
    {
        $tipos = TipoEquipo::all();
        return view('tipoequipos.index',compact('tipos'));
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
    public function show(TipoEquipo $tipoEquipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEquipo $tipoEquipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoEquipo $tipoEquipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEquipo $tipoEquipo)
    {
        //
    }
}
