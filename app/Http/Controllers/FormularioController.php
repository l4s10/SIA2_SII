<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formularios = Formulario::all();
        return view('formularios.index', compact('formularios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formularios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Definimos las reglas para los campos
        $rules = [
            'NOMBRE_FORMULARIO' => 'required|unique:formularios,NOMBRE_FORMULARIO|regex:/^[a-zA-Z0-9\s]+$/',
            'TIPO_FORMULARIO' => 'required',
        ];
        $messages = [
            'NOMBRE_FORMULARIO.required' => 'El nombre del formulario es obligatorio.',
            'NOMBRE_FORMULARIO.unique' => 'Este nombre del formulario ya ha sido registrado.',
            'NOMBRE_FORMULARIO.regex' => 'El nombre del formulario solo puede contener letras y números.',
            'TIPO_FORMULARIO.required' => 'El tipo de formulario es obligatorio.',
        ];
        $request->validate($rules,$messages);
        $data = $request->except('_token');
        try{
            Formulario::create($data);
            session()->flash('success','El formulario ha sido creado existosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al crear el formulario, vuelva a intentarlo más tarde');
        }
        return redirect('/formularios');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formulario $formulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = Formulario::find($id);
        try{
            $request->delete();
            session()->flash('success','El formulario ha sido eliminado exitosamente');
        }catch(\Exception $e){
            session()->flash('error', 'Error al eliminar el formulario seleccionado, vuelva a intentarlo mas tarde');
        }
        return redirect('/formularios');
    }
}
