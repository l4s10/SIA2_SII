<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\DireccionRegional;
use App\Models\Region;
use App\Models\Ubicacion;



class DireccionRegionalController extends Controller
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
        $direcciones = DireccionRegional::all();
        return view('direccionregional.index',compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
        $regiones = Region::all();
        return view('direccionregional.create',compact('regiones'));
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
            $region = $direcciones->region->REGION;
            return view('direccionregional.show', compact('direcciones','region'));
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
        $regiones = Region::all();
        return view('direccionregional.edit',compact('direcciones','regiones'));
    }

    /**
     * Update the specified resource in storage.
     *///Guarda el formulario de edicion en la bd
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        $request->validate(DireccionRegional::$rules, DireccionRegional::$messages);
        try {
            //dd($request->input('ID_REGION'));
            $direcciones = DireccionRegional::find($id);
            $direcciones->fill([
                'DIRECCION' => $request->input('DIRECCION'),
                'ID_REGION' => $request->input('ID_REGION')
            ]);
            $direcciones->save();
            session()->flash('success', 'La dirección regional fue modificada exitosamente');
            //dd($request->input('ID_REGION'));
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la dirección regional seleccionado: ' . $e->getMessage());
        }
        //dd($request->input('ID_REGION'));
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
    public function getDireccion($ubicacionId)
    {
        $direccion = DireccionRegional::where('ID_DIRECCION', '=', Ubicacion::find($ubicacionId)->ID_DIRECCION)->first();
        return response()->json($direccion);
    }
    public function getDirecciones($id)
    {
        $direcciones = DireccionRegional::where('ID_REGION', $id)->get();
        return response()->json($direcciones);
    }
}

