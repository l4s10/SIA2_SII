<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Poliza;



class PolizaController extends Controller
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
        //
        $usuariosConductores = User::with(['polizas' => function ($query) {
            $query->whereNotNull('ID');
        }])->get();
        return view('polizas.index',compact('usuariosConductores'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
        //Búsqueda de usuarios que podrían ser conductores (filtrados por direccion regional auth())
        $direccionRegional = auth()->user()->ubicacion->direccion->ID_DIRECCION;
        $users = User::whereHas('ubicacion.direccion', function ($query) use ($direccionRegional) {
            $query->where('ID_DIRECCION', $direccionRegional);
        })->get();

        return view('polizas.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario
    public function store(Request $request)
    {
        try{   
            $request->validate(Poliza::rules(), Poliza::messages());
            $data = $request->except('_token');
            Poliza::create($data);
            session()->flash('success','La póliza fue agregada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar la póliza. Vuelva a intentarlo nuevamente' .$e->getMessage());
        }
        return redirect(route('polizas.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    // PolizaController@show
    public function show(string $id)
    {
        try {
            $poliza = Poliza::with('user')->find($id);
            return view('polizas.show', compact('poliza'));
        } catch (\Exception $e) {
            session()->flash('error', 'Error al acceder a la póliza seleccionada, vuelva a intentarlo más tarde.');
            return view('polizas.index');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $poliza = Poliza::with('user')->find($id);
        $direccionRegional = auth()->user()->ubicacion->direccion->ID_DIRECCION;
        $users = User::whereHas('ubicacion.direccion', function ($query) use ($direccionRegional) {
            $query->where('ID_DIRECCION', $direccionRegional);
        })->get();
        return view('polizas.edit',compact('poliza','users'));
    }

    /**
     * Update the specified resource in storage.
     *///Guarda el formulario de edicion en la bd
    public function update(Request $request, string $id)
    {
        $request->validate(Poliza::rules(), Poliza::messages());
        try {
            $poliza = Poliza::find($id);
            $poliza->fill([
                'NRO_POLIZA' => $request->input('NRO_POLIZA'),
                'ID' => $request -> input('ID'),
                'FECHA_VENCIMIENTO_LICENCIA' => $request->input('FECHA_VENCIMIENTO_LICENCIA')
            ]);
            $poliza->save();
            session()->flash('success', 'La póliza fue modificada exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar la póliza seleccionada: ' . $e->getMessage());
        }
        return redirect(route('polizas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $polizas = Poliza::find($id);
        try{
            $polizas->delete();
            session()->flash('success','La póliza ha sido eliminada correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la póliza seleccionada, vuelva a intentarlo nuevamente.');
        }
        return redirect(route('polizas.index'));
    }
}

