<?php

namespace App\Http\Controllers;

use App\Models\TipoEquipo;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TipoEquiposController extends Controller
{
    //Protegemos las rutas para que solo los usuarios autentificados entren (ademas de los roles requeridos)
    public function __construct()
    {
        $this->middleware(['auth' , 'roleAdminAndSupport']);
    }
    /**
     * Display a listing of the resource.
     */
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
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('tipoequipos.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            TipoEquipo::create($request->all());
            session()->flash('success', 'El tipo de equipo se ha creado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al crear el tipo de equipo, vuelva a intentarlo más tarde');
        }

        return redirect(route('tipoequipos.index'));
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
    public function update(Request $request, string $id)
    {
        $solicitud = TipoEquipo::find($id);

        $rules = [
            'TIPO_EQUIPO' => 'required|unique:tipo_equipos,TIPO_EQUIPO|string',
        ];
        $messages = [
            'TIPO_EQUIPO.required' => 'El tipo de equipo es requerido',
            'TIPO_EQUIPO.unique' => 'El tipo de equipo ya existe',
            'TIPO_EQUIPO.string' => 'El tipo de equipo debe ser un campo de texto'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('tipoequipos.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $solicitud->update($request->all());
            session()->flash('success', 'El tipo de equipo se ha actualizado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al actualizar el tipo de equipo, vuelva a intentarlo más tarde');
        }

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoEquipo = TipoEquipo::find($id);

        $existeRelacion = Equipo::where('ID_TIPO_EQUIPOS', $id)->exists();

        if($existeRelacion){
            session()->flash('error', 'No se puede eliminar el tipo de equipo porque existen registros asignados con este tipo.');
            return redirect(route('tipoequipos.index'));
        }

        try {
            $tipoEquipo->delete();
            session()->flash('success', 'El tipo de equipo se eliminó exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el tipo seleccionado.');
        }

        return redirect(route('tipoequipos.index'));
    }
}
