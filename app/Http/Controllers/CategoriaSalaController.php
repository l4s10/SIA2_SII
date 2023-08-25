<?php

namespace App\Http\Controllers;

use App\Models\CategoriaSala;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CategoriaSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct()
    {
        //Verificamos si la persona esta ingresada, sino. pasa a la pantalla de inicio de sesion
        $this->middleware('auth');
        //Verificamos que las personas que ingresen tengan los roles requeridos
        $this->middleware('roleAdminAndSupport');
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
        //Se valida la entrada y en caso de error se redirige al formulario con los mensajes
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('categoriasalas.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->except('_token');
        try{
            CategoriaSala::create($data);
            session()->flash('success','La categoria se ha creado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la categoria de sala');
        }
        return redirect(route('categoriasalas.index'));
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
    public function update(Request $request, $id)
    {
        $rules = [
            'CATEGORIA_SALA' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('categoria_salas')->ignore($id,'CATEGORIA_SALA')],
        ];

        // Mensajes de feedback para el usuario
        $messages = [
            'CATEGORIA_SALA.required' => 'El campo Nombre es obligatorio.',
            'CATEGORIA_SALA.unique' => 'Este tipo de sala ya existe.',
            'CATEGORIA_SALA.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];

        // Se valida la entrada y en caso de error se redirige al formulario con los mensajes
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('categoriasalas.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('_token');

        try {
            $categoria = CategoriaSala::findOrFail($id);
            $categoria->update($data);
            session()->flash('success', 'La categoría se ha actualizado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al actualizar la categoría de sala');
        }

        return redirect(route('categoriasalas.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaSala::find($id);

        // Verificar si existen registros relacionados en el modelo SALAS
        $existeRelacion = Sala::where('ID_CATEGORIA_SALA', $id)->exists();

        if ($existeRelacion) {
            session()->flash('error', 'No se puede eliminar la categoría porque existen registros con esta categoria.');
            return redirect(route('categoriasalas.index'));
        }

        try{
            $categoria->delete();
            session()->flash('success','La categoría se ha eliminado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la categoria seleccionada.');
        }
        return redirect(route('categoriasalas.index'));
    }
}
