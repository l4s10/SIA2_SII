<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Comuna;
use App\Models\DireccionRegional;
use App\Models\Region;

class ComunaController extends Controller
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
        $comunas = Comuna::all();
        return view('comuna.index',compact('comunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regiones = Region::all();
        return view('comuna.create',compact('regiones'));
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
            $region = $comuna->regionAsociada->REGION;
            return view('comuna.show', compact('comuna','region'));
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
        return view('comuna.edit',compact('comuna','regiones'));
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
            ]);
            $comuna -> save();
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
