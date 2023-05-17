<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TipoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('SERVICIOS')) {
                return $next($request);
            } else {
                abort(403, 'Acceso no autorizado');
            }
        });
    }

    public function index()
    {
        $tipos = TipoMaterial::all();
        return view('tipomaterial.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipomaterial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Especificamos la regla de los campos y los mensajes de validaciones
        $rules = [
            'TIPO_MATERIAL' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('tipo_material')],
        ];
        //Mensajes de feedback para usuario
        $messages = [
            'TIPO_MATERIAL.required' => 'El campo Nombre es obligatorio.',
            'TIPO_MATERIAL.unique' => 'Este tipo de material ya existe.',
            'TIPO_MATERIAL.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];
        //Validamos la request con las reglas y devolviendo los mensajes especificados anteriormente
        $request->validate($rules,$messages);

        $data = $request->except('_token');
        // TipoMaterial::create($data);
        // return redirect('/tipomaterial')->with('success','El tipo de material se ha creado correctamente.');
        try{
            TipoMaterial::create($data);
            session()->flash('success','Tipo de material creado existosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al crear tipo de material');
        }
        return redirect('/tipomaterial');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMaterial $tipoMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $tipo = TipoMaterial::find($id);
        }catch(\Exception $e){
            session()->flash('error','Error al acceder al tipo de material seleccionado');
            return redirect('/tipomaterial');
        }
        return view('tipomaterial.edit')->with('tipo',$tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo = TipoMaterial::find($id);
        //Especificamos la regla de los campos y los mensajes de validaciones
        $rules = [
            'TIPO_MATERIAL' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('tipo_material')],
        ];
        //Mensajes de feedback para usuario
        $messages = [
            'TIPO_MATERIAL.required' => 'El campo Nombre es obligatorio.',
            'TIPO_MATERIAL.unique' => 'Este tipo de material ya existe.',
            'TIPO_MATERIAL.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];
        //validamos la request
        $request->validate($rules,$messages);
        try{
            $tipo->update($request->all());
            session()->flash('success','El tipo de material ha sido modificado exitosamente!.');
        }catch(\Exception $e){
            session()->flash('error','Error al modificar el tipo de material');
        }
        return redirect('/tipomaterial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = TipoMaterial::find($id);
        try{
            $tipo->delete();
            session()->flash('success','El tipo de material ha sido eliminado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el tipo de material');
        }
        return redirect('/tipomaterial');
    }
}
