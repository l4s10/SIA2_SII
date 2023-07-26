<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Region;



class RegionController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            if ($user->hasRole('ADMINISTRADOR') || $user->hasRole('SERVICIOS') || $user->hasRole('INFORMATICA')) {
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
        $regiones = Region::all();
        return view('region.index',compact('regiones'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario
    public function store(Request $request)
    {
        try{   
            
            $request->validate(Region::$rules, Region::$messages);
            $data = $request->except('_token');
            Region::create($data);
            

            session()->flash('success','La región fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la región. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('region.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $region = Region::find($id);
            return view('region.show', compact('region'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la región seleccionada, vuelva a intentarlo más tarde.');
            return view('region.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $region = Region::find($id);
        return view('region.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *///Guarda el formulario de edicion en la bd
    public function update(Request $request, string $id)
    {
        $request->validate(Region::$rules, Region::$messages);
        try {
            $region = Region::find($id);
            $region->fill([
                'REGION' => $request->input('REGION'),
            ]);
            $region->save();
            session()->flash('success', 'La región fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la región seleccionado: ' . $e->getMessage());
        }
        return redirect(route('region.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);
        try{
            $region->delete();
            session()->flash('success','La región ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la región seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('region.index'));
    }
}

