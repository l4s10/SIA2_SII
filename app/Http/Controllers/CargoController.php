<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cargo;
use App\Models\DireccionRegional;




class CargoController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct(){
        $this->middleware('auth');
        // Roles que pueden ingresar a la url
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
        // Obtiene la dirección regional del funcionario con sesión activa
        $direccionRegional = auth()->user()->cargo->ID_DIRECCION;
        $cargos = Cargo::join('direcciones_regionales', 'cargos.ID_DIRECCION', '=', 'direcciones_regionales.ID_DIRECCION')
        ->where('cargos.ID_DIRECCION', $direccionRegional)
        ->select('cargos.ID_CARGO', 'cargos.CARGO', 'direcciones_regionales.DIRECCION')
        ->get();
        return view('cargo.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *///Carga formulario de creacion
     public function create()
    {
       // Obtiene la dirección regional del funcionario con sesión activa
        $direccionRegional = auth()->user()->ubicacion->ID_DIRECCION;
        
        // Obtiene las direcciones regionales filtradas por la dirección regional sesión autenticada
        $direccion = DireccionRegional::where('ID_DIRECCION', $direccionRegional)
            ->pluck('DIRECCION', 'ID_DIRECCION');
        
        return view('cargo.create', compact('direccion'));

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
        // Obtiene la dirección regional del funcionario con sesión activa
        $direccionRegional = auth()->user()->ubicacion->ID_DIRECCION;
        // Obtiene las direcciones regionales filtradas por la dirección regional sesión autenticada
        $direccion = DireccionRegional::where('ID_DIRECCION', $direccionRegional)
            ->pluck('DIRECCION', 'ID_DIRECCION');
        $cargo = Cargo::find($id);
        return view('cargo.edit',compact('cargo','direccion'));
    }

    public function update(Request $request, string $id)
    {
        try {
            // Imprime los datos para verificar qué se está enviando al servidor
            //dd($request->all());

            $request->validate(Cargo::$rules, Cargo::$messages);

            $cargo = Cargo::find($id);
            $cargo->update($request->only('CARGO'));

            session()->flash('success', 'El cargo fue modificado exitosamente');
        } catch(\Exception $e) {
            // Imprime información de error para depuración
            dd($e->getMessage());

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

