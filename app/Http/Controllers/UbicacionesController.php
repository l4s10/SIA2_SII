<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;
use App\Models\DireccionRegional;
class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene la dirección regional del funcionario con sesión activa
        $direccionRegional = auth()->user()->ubicacion->ID_DIRECCION;
        
        // Obtiene las ubicaciones y el nombre de la dirección regional asociada según DR en sesión activa
        $ubicaciones = Ubicacion::join('direcciones_regionales', 'ubicacion.ID_DIRECCION', '=', 'direcciones_regionales.ID_DIRECCION')
            ->where('ubicacion.ID_DIRECCION', $direccionRegional)
            ->select('ubicacion.ID_UBICACION', 'ubicacion.UBICACION', 'direcciones_regionales.DIRECCION')
            ->get();
            
        return view('ubicacion.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
     public function create()
    {

        //OPCION PARA CREAR UBICACIONES EN DISTINTAS DIRECCIONES REGIONALES (POR REGION):
        //Obtiene la región del funcionario con sesión activa (quien utiliza el sw). Funcionalidad orientada a las DDRR de Stgo.       
        $region = auth()->user()->region->ID_REGION;
        //Obtiene arreglo asociativo que incluye 'DIRECCION' e 'ID_DIRECCION' desde 'direcciones_regionales', filtradas por $region
        $direcciones = DireccionRegional::where('ID_REGION', $region)
            ->pluck('DIRECCION', 'ID_DIRECCION');
        return view('ubicacion.create', compact('direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario

    public function store(Request $request)
    {
        try{

            $request->validate(Ubicacion::$rules, Ubicacion::$messages);
            $data = $request->except('_token');
            Ubicacion::create($data);

            session()->flash('success','La ubicacion fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la ubicacion. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('ubicacion.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
     public function show(string $id)
     {
         try{
             $ubicacion = Ubicacion::find($id);
             return view('ubicacion.show', compact('ubicacion'));
         }catch(\Exception $e){
             session()->flash('error', 'Error al acceder en la ubicación seleccionada, vuelva a intentarlo más tarde.');
             return view('ubicacion.show');
         }
     }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
     public function edit(string $id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion.edit',compact('ubicacion'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(Ubicacion::$rules, Ubicacion::$messages);
        try {
            $ubicacion = Ubicacion::find($id);
            $ubicacion->fill([
                'UBICACION' => $request->input('UBICACION'),
            ]);
            $ubicacion->save();
            session()->flash('success', 'La ubicación fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la ubicación seleccionada: ' . $e->getMessage());
        }
        return redirect(route('ubicacion.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $ubicacion = Ubicacion::find($id);
            $ubicacion->delete();
            session()->flash('success','La ubicación ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la ubicación seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('ubicacion.index'));
    }
    public function getUbicaciones($direccionId)
    {
        // Asume que tienes un modelo Ubicacion que tiene una relación con Direcciones
        $ubicaciones = Ubicacion::where('ID_DIRECCION', $direccionId)->get();

        return response()->json($ubicaciones);
    }
}
