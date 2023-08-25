<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormularioController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados y con los permisos requeridos
    public function __construct(){
        $this->middleware(['auth', 'roleAdminAndServices']);
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
        return redirect(route('formularios.index'));
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
    public function edit(string $id)
    {
        $formulario = Formulario::find($id);
        return view('formularios.edit',compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formulario = Formulario::find($id);
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
        try{
            $formulario->update($request->all());
            session()->flash('success','El formulario se ha modificado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al modificar el formulario, vuelva a intentarlo más tarde.');
        }
        return redirect(route('formularios.index'));
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
        return redirect(route('formularios.index'));
    }
}
