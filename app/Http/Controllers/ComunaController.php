<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
use App\Models\DireccionRegional;
use App\Models\Region;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comunas = Comuna::all();
        return view('comuna.index',compact('comunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        return view('comuna.create',compact('regiones','direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validamos los datos recibidos del formulario
            $request->validate(Comuna::$rules, Comuna::$messages);
            $data = $request -> except('_token');
            Comuna::create($data);

            session()->flash('success','La comuna fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la comuna. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('comuna.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $comuna = Comuna::find($id);
            return view('comuna.show', compact('comuna'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la comuna seleccionada, vuelva a intentarlo más tarde.');
            return view('comuna.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comuna = Comuna::find($id);
        $regiones = Region::all();
        $direcciones = DireccionRegional::all();
        return view('comuna.edit',compact('comuna','regiones','direcciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $comuna = Comuna::find($id);
            $comuna->fill([
                'COMUNA' => $request -> input('COMUNA'),
                'ID_REGION' => $request -> input('ID_REGION'),
                'ID_DIRECCION' => $request -> input('ID_DIRECCION')
            ]);
            $comuna -> save();
            /*$material = new Material();
            $material->NOMBRE_MATERIAL = $request->NOMBRE_MATERIAL;
            $material->ID_TIPO_MAT = $request->ID_TIPO_MAT;
            $material->STOCK = $request->STOCK;
            $material->save();*/
            session()->flash('success', 'La comuna fue creada exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear la comuna');
        }
        // Redirigimos al listado de comunas
        return redirect(route('comuna.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comuna = Comuna::find($id);
        try{
            $comuna->delete();
            session()->flash('success','La comuna ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la comuna seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('comuna.index'));
    }
}
