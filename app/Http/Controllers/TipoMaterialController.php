<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TipoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct()
    {
        $this->middleware(['auth', 'roleAdminAndServices']);
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
        // Especificamos la regla de los campos y los mensajes de validación
        $rules = [
            'TIPO_MATERIAL' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('tipo_material')],
        ];

        // Mensajes de feedback para usuario
        $messages = [
            'TIPO_MATERIAL.required' => 'El campo Nombre es obligatorio.',
            'TIPO_MATERIAL.unique' => 'Este tipo de material ya existe.',
            'TIPO_MATERIAL.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];

        // Validamos la request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('tipomaterial.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            TipoMaterial::create($request->all());
            session()->flash('success', 'Tipo de material creado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear tipo de material');
        }

        return redirect(route('tipomaterial.index'));
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

        // Especificamos la regla de los campos y los mensajes de validación
        $rules = [
            'TIPO_MATERIAL' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255', Rule::unique('tipo_material')->ignore($id,'TIPO_MATERIAL')],
        ];

        // Mensajes de feedback para usuario
        $messages = [
            'TIPO_MATERIAL.required' => 'El campo Nombre es obligatorio.',
            'TIPO_MATERIAL.unique' => 'Este tipo de material ya existe.',
            'TIPO_MATERIAL.regex' => 'El campo Nombre solo puede contener letras y espacios.',
        ];

        // Validamos la request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('tipomaterial.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $tipo->update($request->all());
            session()->flash('success', 'El tipo de material ha sido modificado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al modificar el tipo de material');
        }

        return redirect(route('tipomaterial.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = TipoMaterial::find($id);

        // Verificar si existen registros relacionados en el modelo MATERIALES
        $existeRelacion = Material::where('ID_TIPO_MAT', $id)->exists();

        if ($existeRelacion) {
            session()->flash('error', 'No se puede eliminar el tipo de material porque existen registros con este tipo.');
            return redirect(route('tipomaterial.index'));
        }

        try {
            $tipo->delete();
            session()->flash('success', 'El tipo de material se ha eliminado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el tipo de material seleccionado.');
        }

        return redirect(route('tipomaterial.index'));
    }
}
