<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Validation\Rule;
//use Illuminate\Support\Facades\Auth;
use App\Models\Cargo;




class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::pluck('CARGO', 'ID_CARGO');
        return view('cargo.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
     public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario

    public function store(Request $request)
    {
        try{

            $request->validate(Cargo::$rules, Cargo::$messages);
            $data = $request->except('_token');
            Cargo::create($data);

            session()->flash('success','El cargo fue agregado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar el cargo. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('cargos.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
     public function show(string $id)
     {
         try{
             $cargo = Cargo::find($id);
             return view('cargo.show', compact('cargo'));
         }catch(\Exception $e){
             session()->flash('error', 'Error al acceder al cargo seleccionado, vuelva a intentarlo más tarde.');
             return view('cargo.show');
         }
     }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
     public function edit(string $id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.edit',compact('cargo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(Cargo::$rules, Cargo::$messages);
        try {
            $cargo = Cargo::find($id);
            $cargo->fill([
                'CARGO' => $request->input('CARGO'),
            ]);
            $cargo->save();
            session()->flash('success', 'El cargo fue modificado exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar el cargo seleccionado: ' . $e->getMessage());
        }
        return redirect(route('cargos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $cargo = Cargo::find($id);
            $cargo->delete();
            session()->flash('success','El cargo ha sido eliminado correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el cargo seleccionado, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('cargos.index'));
    }
}

