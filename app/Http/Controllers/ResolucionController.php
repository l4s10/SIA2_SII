<?php

namespace App\Http\Controllers;

use App\Models\Resolucion;
use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Auth;



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
        return view('resolucion.create');
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario
    public function store(Request $request)
    {
        try{   
            
            $request->validate(Resolucion::rules(), Resolucion::messages());
            $data = $request->except('_token');
            Resolucion::create($data);
            

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
            $resoluciones = Resolucion::find($id);
            return view('resolucion.show', compact('resoluciones'));
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
        $resoluciones = Resolucion::find($id);
        return view('resolucion.edit',compact('resoluciones'));
    }


    /*$resoluciones = Resolucion::find($id);
    $resoluciones->update([
        'NRO_RESOLUCION' => $request->input('NRO_RESOLUCION'),
        'FECHA' => $request->input('FECHA'),
        'AUTORIDAD' => $request->input('AUTORIDAD'),
        'FUNCIONARIOS_DELEGADOS' => $request->input('FUNCIONARIOS_DELEGADOS'),
        'MATERIA' => $request->input('MATERIA')
    ]);*/

    /**
     * Update the specified resource in storage.
     *///Guarda el formulario de edicion en la bd
     /*public function update(Request $request, string $id)
     {
         $request->validate(Resolucion::rules(), Resolucion::messages());
         try {
             $resoluciones = Resolucion::find($id);
             $resoluciones->fill([
                'NRO_RESOLUCION' => $request->input('NRO_RESOLUCION'),
                'FECHA' => $request->input('FECHA'),
                'AUTORIDAD' => $request->input('AUTORIDAD'),
                'FUNCIONARIOS_DELEGADOS' => $request->input('FUNCIONARIOS_DELEGADOS'),
                'MATERIA'  => $request->input('MATERIA')
             ]);
             $resoluciones->save();
             session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
         } catch(\Exception $e) {
             session()->flash('error', 'Error al modificar la resolución delegatoria seleccionado: ' . $e->getMessage());
         }
         return redirect(route('resolucion.index'));
     }
     public function update(Request $request, string $id)
    {
        $request->validate(Resolucion::rules(), Resolucion::messages());
        try {
            $resolucion = Resolucion::find($id);
            $resolucion->fill([
                'NRO_RESOLUCION' => $request->input('NRO_RESOLUCION'),
                'FECHA' => $request->input('FECHA'),
                'AUTORIDAD' => $request->input('AUTORIDAD'),
                'FUNCIONARIOS_DELEGADOS' => $request->input('FUNCIONARIOS_DELEGADOS'),
                'MATERIA'  => $request->input('MATERIA')
            ]);
            $resolucion->save();
            session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la resolución delegatoria seleccionada: ' . $e->getMessage());
        }
        return redirect(route('resolucion.index'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(Resolucion::rules(), Resolucion::messages());
        $resoluciones = Resolucion::find($id);
        try {
            $resoluciones->update($request->all());
            session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al modificar la resolución delegatoria seleccionada: ' . $e->getMessage());
        }
        return redirect(route('resolucion.index'));
    }*/

    public function update(Request $request, string $id)
    {
        $request->validate(Resolucion::rules(), Resolucion::messages());
        try {
            $resolucion = Resolucion::find($id);
            $resolucion->fill([
                'NRO_RESOLUCION' => $request->input('NRO_RESOLUCION'),
                'FECHA' => $request->input('FECHA'),
                'AUTORIDAD' => $request->input('AUTORIDAD'),
                'FUNCIONARIOS_DELEGADOS' => $request->input('FUNCIONARIOS_DELEGADOS'),
                'MATERIA'  => $request->input('MATERIA')
            ]);
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
        $resolucion = Resolucion::find($id);
        try{
            $resolucion->delete();
            session()->flash('success','La resolución delegatoria ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la resolución delegatoria seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('resolucion.index'));
    }
}

