<?php

namespace App\Http\Controllers;

use App\Models\CategoriaSala;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //Buscar categorias existentes en la tabla
        $categorias = CategoriaSala::all();
        //Se retorna la vista con las categorias recuperadas
        return view('categoriasalas.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoriasalas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'CATEGORIA_SALA' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('categoria_salas')],
        ];
        //Mensajes de feedback para usuario
        $messages = [
            'CATEGORIA_SALA.required' => 'El campo Nombre es obligatorio.',
            'CATEGORIA_SALA.unique' => 'Este tipo de sala ya existe.',
            'CATEGORIA_SALA.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];
        $request->validate($rules,$messages);
        $data = $request->except('_token');
        try{
            CategoriaSala::create($data);
            session()->flash('success','La categoria se ha creado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la categoria de sala');
        }
        return redirect('/categoriasalas');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaSala $categoriaSala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $categoria = CategoriaSala::find($id);
        }catch(\Exception $e){
            session()->flash('error','Error al acceder a la categoria seleccionada.');
        }
        return view('categoriasalas.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = CategoriaSala::find($id);
        $rules = [
            'CATEGORIA_SALA' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('categoria_salas')],
        ];
        //Mensajes de feedback para usuario
        $messages = [
            'CATEGORIA_SALA.required' => 'El campo Nombre es obligatorio.',
            'CATEGORIA_SALA.unique' => 'Este tipo de sala ya existe.',
            'CATEGORIA_SALA.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];
        $request->validate($rules,$messages);
        try{
            $categoria->update($request->all());
            session()->flash('success','La categoria se ha modificado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al modificar la categoria seleccionada');
        }
        return redirect('/categoriasalas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaSala::find($id);
        try{
            $categoria->delete();
            session()->flash('success','La categoría se ha eliminado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la categoria seleccionada.');
        }
        return redirect('/categoriasalas');
    }
}
