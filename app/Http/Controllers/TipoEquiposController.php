<?php

namespace App\Http\Controllers;

use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return view('tipoequipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'TIPO_EQUIPO' => [
                'required',
                'string',
                Rule::unique('tipo_equipos')
            ]
        ];
        $messages = [
            'TIPO_EQUIPO.required' => 'El campo tipo de equipo es obligatorio',
            'TIPO_EQUIPO.string' => 'El campo tipo de equipo debe ser una cadena',
            'TIPO_EQUIPO.unique' => 'El campo tipo de equipo ya existe'
        ];
        $request->validate($rules,$messages);
        try{
            TipoEquipo::create($request->all());
            session()->flash('success','El tipo de equipo se ha creado exitosamente.');
        }catch(\Exception $e){
            session()->flash('Error','Hubo un error al crear el tipo de equipo, vuelva a intentarlo mas tarde');
        }
        return redirect('/tipoequipos');
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
    public function edit(string $id)
    {
        $solicitud = TipoEquipo::find($id);
        return view('tipoequipos.edit',compact('solicitud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $solicitud = TipoEquipo::find($id);
        $rules=[
            'TIPO_EQUIPO' => 'required|unique:tipo_equipos,TIPO_EQUIPO|string',
        ];
        $messages=[
            'TIPO_EQUIPO.required' => 'El tipo de equipo es requerido',
            'TIPO_EQUIPO.unique' => 'El tipo de equipo ya existe',
            'TIPO_EQUIPO.string' => 'El tipo de equipo debe ser un campo de texto'
        ];
        $request->validate($rules,$messages);
        try{
            $solicitud->update($request->all());
            session()->flash('success','El tipo de equipo se ha creado exitosamente.');
        }catch(\Exception $e){
            session()->flash('Error','Hubo un error al crear el tipo de equipo, vuelva a intentarlo mas tarde');
        }
        return redirect('/tipoequipos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = TipoEquipo::find($id);
        try{
            $request->delete();
            session()->flash('success','El tipo de equipo se eliminó exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el tipo seleccionado.');
        }
        return redirect('/tipoequipos');
    }
}
