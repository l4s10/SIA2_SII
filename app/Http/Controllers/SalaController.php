<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\CategoriaSala;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct()
    {
        $this->middleware(['auth', 'roleAdminAndSupport']);
    }
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index',compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Listamos las categorias existentes en la BDD.
        $categorias = CategoriaSala::all();
        return view('salas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'NOMBRE_SALA' => 'required|max:128',
            'CAPACIDAD_PERSONAS' => 'required|integer',
            'ESTADO_SALA' => 'required|max:128',
            'ID_CATEGORIA_SALA' => 'required|integer',
        ];

        $messages = [
            'NOMBRE_SALA.required' => 'El nombre de la sala es obligatorio.',
            'NOMBRE_SALA.max' => 'El nombre de la sala no debe tener más de 128 caracteres.',
            'CAPACIDAD_PERSONAS.required' => 'La capacidad de personas es obligatoria.',
            'CAPACIDAD_PERSONAS.integer' => 'La capacidad de personas debe ser un número entero.',
            'ESTADO_SALA.required' => 'El estado de la sala es obligatorio.',
            'ESTADO_SALA.max' => 'El estado de la sala no debe tener más de 128 caracteres.',
            'ID_CATEGORIA_SALA.required' => 'La categoría de la sala es obligatoria.',
            'ID_CATEGORIA_SALA.integer' => 'La categoría de la sala debe ser un número entero.',
        ];

        $request->validate($rules, $messages);
        $data = $request->except('_token');
        try{
            Sala::create($data);
            session()->flash('success','La sala se ha creado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la sala.'. $e->getMessage());
        }
        return redirect(route('salas.index'));
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
        $sala = Sala::find($id);
        $categorias = CategoriaSala::all();
        return view('salas.edit',compact('sala','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sala = Sala::find($id);
        $rules = [
            'NOMBRE_SALA' => 'required|max:128',
            'CAPACIDAD_PERSONAS' => 'required|integer',
            'ESTADO_SALA' => 'required|max:128',
            'ID_CATEGORIA_SALA' => 'required|integer',
        ];

        $messages = [
            'NOMBRE_SALA.required' => 'El nombre de la sala es obligatorio.',
            'NOMBRE_SALA.max' => 'El nombre de la sala no debe tener más de 128 caracteres.',
            'CAPACIDAD_PERSONAS.required' => 'La capacidad de personas es obligatoria.',
            'CAPACIDAD_PERSONAS.integer' => 'La capacidad de personas debe ser un número entero.',
            'ESTADO_SALA.required' => 'El estado de la sala es obligatorio.',
            'ESTADO_SALA.max' => 'El estado de la sala no debe tener más de 128 caracteres.',
            'ID_CATEGORIA_SALA.required' => 'La categoría de la sala es obligatoria.',
            'ID_CATEGORIA_SALA.integer' => 'La categoría de la sala debe ser un número entero.',
        ];

        $request->validate($rules, $messages);

        try{
            $sala->update($request->all());
            session()->flash('success','La sala se ha modificado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al modificar la sala seleccionada');
        }
        return redirect(route('salas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sala = Sala::find($id);
        try{
            $sala->delete();
            session()->flash('success','La sala se ha eliminado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la sala seleccionada.');
        }
        return redirect(route('salas.index'));
    }
}
