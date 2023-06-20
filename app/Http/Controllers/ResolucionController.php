<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Auth;
use App\Models\Resolucion;
use App\Models\Cargo;
use App\Models\TipoResolucion;
use App\Models\Facultad;



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
        $tiposResolucion = TipoResolucion::pluck('NOMBRE', 'ID_TIPO');
        $facultades = Facultad::pluck('NOMBRE', 'ID_FACULTAD');
        $firmantes = Cargo::pluck('CARGO', 'ID_CARGO');
        $delegados = Cargo::pluck('CARGO', 'ID_CARGO');
         
         return view('resolucion.create', compact('tiposResolucion', 'facultades','firmantes','delegados'));
     }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario

    public function store(Request $request)
    {
        try {
            $request->validate(Resolucion::rules($request->input('NRO_RESOLUCION')), Resolucion::messages());
    
            $fecha = $request->input('FECHA');
            if (Carbon::parse($fecha)->isAfter(Carbon::now())) {
                throw new \Exception('. La fecha debe ser anterior o igual a la fecha actual.');
            }
    
            $data = $request->only('NRO_RESOLUCION', 'FECHA', 'ID_TIPO', 'ID_FIRMANTE', 'ID_FACULTAD', 'ID_DELEGADO');
    
            $resolucion = Resolucion::create($data);
    
            session()->flash('success', 'La resolución delegatoria fue agregada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al agregar la resolución delegatoria. Vuelva a intentarlo nuevamente' . $e->getMessage());
        }
    
        return redirect(route('resolucion.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $resolucion = Resolucion::with('tipo', 'firmante', 'delegado', 'facultad')->find($id);
            return view('resolucion.show', compact('resolucion'));  
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la resolución delegatoria seleccionada, vuelva a intentarlo más tarde.');
            return redirect(route('resolucion.index'));
        }
    }
/*
    public function show(string $id)
    {
        try {
            $resolucion = Resolucion::with('cargo')->find($id);
            return view('resolucion.show', compact('resolucion'));
        } catch (\Exception $e) {
            session()->flash('error', 'Error al acceder a la resolución delegatoria seleccionada, vuelva a intentarlo más tarde.');
        }
    }*/
    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $resolucion = Resolucion::findOrFail($id);
        $tiposResolucion = TipoResolucion::pluck('NOMBRE', 'ID_TIPO');
        $facultades = Facultad::pluck('NOMBRE', 'ID_FACULTAD');
        $firmantes = Cargo::pluck('CARGO', 'ID_CARGO');
        $delegados = Cargo::pluck('CARGO', 'ID_CARGO');
         
        return view('resolucion.edit', compact('resolucion', 'tiposResolucion', 'facultades', 'firmantes', 'delegados'));
    }


     public function update(Request $request, string $id)
     {
        try {
            $resolucion = Resolucion::find($id);
            $rules = Resolucion::rules($resolucion->ID_RESOLUCION);
            $request->validate($rules, Resolucion::messages());
    
            $fecha = $request->input('FECHA');
            if (strtotime($fecha) > time()) {
                throw new \Exception('. La fecha debe ser anterior o igual a la fecha actual');
            }
    
            $data = $request->only('NRO_RESOLUCION', 'FECHA', 'ID_TIPO', 'ID_FIRMANTE', 'ID_FACULTAD', 'ID_DELEGADO');
            $resolucion->fill($data);
            $resolucion->save();
            session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
        } catch (\Exception $e) {
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

