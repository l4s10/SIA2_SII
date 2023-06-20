<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Auth;
use App\Models\Resolucion;
use App\Models\Cargo;



class ResolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resoluciones = Resolucion::all();
        return view('resolucion.index',compact('resoluciones'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
        $cargos = Cargo::all();
        return view('resolucion.create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario
    public function store(Request $request)
    {
        try{   
            $request->validate(Resolucion::rules($request->NRO_RESOLUCION), Resolucion::messages());
            $data = $request->except('_token');
            $resolucion = Resolucion::create($data); //Instancia de resolución para verificar primero la existencia foránea del cargo

        if ($cargo = Cargo::find($request->input('ID_CARGO'))) {
            $resolucion->cargo()->associate($cargo); // Asociar el modelo Cargo a la relación
            $resolucion->save();
        }
            session()->flash('success','La resolución delegatoria fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la resolución delegatoria. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('resolucion.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $resolucion = Resolucion::with('cargo')->find($id); // Incluye la relación entre tablas 'resoluciones' y 'cargos' a través del método 'cargo' del modelo 'resolucion'.
            return view('resolucion.show', compact('resolucion'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la resolución delegatoria seleccionada, vuelva a intentarlo más tarde.');
            return view('resolucion.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $resolucion = Resolucion::find($id);
        $cargos = Cargo::all();
        return view('resolucion.edit',compact('resolucion','cargos'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $resolucion = Resolucion::find($id);
            $rules = Resolucion::rules($resolucion->ID_RESOLUCION);
            $request->validate($rules,Resolucion::messages());
            //$request->validate(Resolucion::rules(), Resolucion::messages());

            $resolucion->fill([
                'NRO_RESOLUCION' => (int) $request->input('NRO_RESOLUCION'),
                'FECHA' => $request->input('FECHA'),
                'ID_CARGO' => $request->input('ID_CARGO'),
                'FUNCIONARIOS_DELEGADOS' => $request->input('FUNCIONARIOS_DELEGADOS'),
                'MATERIA'  => $request->input('MATERIA')
            ]);
            if ($cargo = Cargo::find($request->input('ID_CARGO'))) {
                $resolucion->cargo()->associate($cargo); // Asocia el modelo Cargo a la relación
            }
            $resolucion->save();
            session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la resolución delegatoria seleccionada: ' . $e->getMessage());
        }
        return redirect(route('resolucion.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $resolucion = Resolucion::find($id);
            $resolucion->delete();
            session()->flash('success','La resolución delegatoria ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la resolución delegatoria seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('resolucion.index'));
    }
}
