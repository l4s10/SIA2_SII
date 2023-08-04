<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Facultad;




class FacultadController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('JURIDICO') || $user->hasRole('INFORMATICA')) {
                return $next($request);
            } else {
                abort(403, 'Acceso no autorizado');
            }
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facultades = Facultad::all();
        return view('facultad.index', compact('facultades'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
     public function create()
    {
        return view('facultad.create');
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario

    public function store(Request $request)
    {
        try {
            $request->validate(Facultad::rules(), Facultad::messages());
            $data = $request->except('_token');
            Facultad::create($data);

            session()->flash('success', 'La facultad fue agregada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al agregar la facultad. Vuelva a intentarlo nuevamente' . $e->getMessage());
        }
        return redirect(route('facultades.index'));

        /*try{

            $request->validate(Facultad::rules(), Facultad::messages());
            $data = $request->except('_token');
            Facultad::create($data);


            session()->flash('success','La facultad fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la facultad. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('facultad.index'));*/
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $facultad = Facultad::findOrFail($id);
            return view('facultad.show', compact('facultad'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la facultad seleccionada, vuelva a intentarlo más tarde.');
            return redirect(route('facultades.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
     public function edit(string $id)
    {
        $facultad = Facultad::findOrFail($id);
        return view('facultad.edit',compact('facultad'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(Facultad::rules(), Facultad::messages());
        try {
            $data = $request->only('NOMBRE', 'CONTENIDO', 'LEY_ASOCIADA', 'ART_LEY_ASOCIADA');
            $facultad = Facultad::find($id);
            $facultad->fill($data);
            $facultad->save();
            session()->flash('success', 'La facultad fue modificada exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al modificar la facultad seleccionada: ' . $e->getMessage());
        }
        return redirect(route('facultades.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $facultad = Facultad::find($id);
            $facultad->delete();
            session()->flash('success','La facultad ha sido eliminado correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la facultqad seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('facultades.index'));
    }
}

