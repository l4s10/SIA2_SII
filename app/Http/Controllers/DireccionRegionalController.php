<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
use App\Models\DireccionRegional;



class DireccionRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $direcciones = DireccionRegional::all();
        return view('direccionregional.index',compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
        return view('direccionregional.create');
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario
    public function store(Request $request)
    {
        try{   
            
            $request->validate(DireccionRegional::$rules, DireccionRegional::$messages);
            $data = $request->except('_token');
            DireccionRegional::create($data);
            

            session()->flash('success','La dirección regional fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la dirección regional. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('direccionregional.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $direcciones = DireccionRegional::find($id);
            return view('direccionregional.show', compact('direcciones'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la dirección regional seleccionada, vuelva a intentarlo más tarde.');
            return view('direccionregional.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $direcciones = DireccionRegional::find($id);
        return view('direccionregional.edit',compact('direcciones'));
    }

    /**
     * Update the specified resource in storage.
     *///Guarda el formulario de edicion en la bd
    public function update(Request $request, string $id)
    {
        $request->validate(DireccionRegional::$rules, DireccionRegional::$messages);
        try {
            $direcciones = DireccionRegional::find($id);
            $direcciones->fill([
                'DIRECCION' => $request->input('DIRECCION'),
            ]);
            $direcciones->save();
            session()->flash('success', 'La dirección regional fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la dirección regional seleccionado: ' . $e->getMessage());
        }
        return redirect(route('direccionregional.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $direcciones = DireccionRegional::find($id);
        try{
            $direcciones->delete();
            session()->flash('success','La dirección regional ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la dirección regional seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('direccionregional.index'));
    }
}

