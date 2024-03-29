<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Resolucion;
use App\Models\Cargo;
use App\Models\TipoResolucion;
use App\Models\Facultad;



class ResolucionController extends Controller
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
        $resoluciones = Resolucion::all();
        return view('resolucion.index',compact('resoluciones'));
    }

    /**
    * Show the form for creating a new resource.
     *///Carga formulario de creacion
    public function create()
    {
    $tiposResolucion = TipoResolucion::pluck('NOMBRE', 'ID_TIPO');
    $facultades = Facultad::pluck('NOMBRE', 'ID_FACULTAD');
    $firmantes = Cargo::pluck('CARGO', 'ID_CARGO');
    $delegados = Cargo::pluck('CARGO', 'ID_CARGO');

        return view('resolucion.create', compact('tiposResolucion', 'facultades','firmantes','delegados'));
    }

    /**
     * Store a newly created resource in storage.
     *///Guarda los datos del formulario

    public function store(Request $request)
    {
        try {
        $request->validate(Resolucion::rules(), Resolucion::messages());
    
            $fecha = $request->input('FECHA');
            $fechaSeleccionada = strtotime($fecha);

            // Calcular la fecha de inicio (un año atrás)
            $fechaInicio = strtotime('-1 year');

            // Calcular la fecha de fin (31 días después del día actual)
            $fechaFin = strtotime('+31 days');

            if ($fechaSeleccionada < $fechaInicio || $fechaSeleccionada > $fechaFin) {
                throw new \Exception('La fecha debe ser anterior a un año a partir del día actual o hasta 31 días después del día actual');
            }
    
            $data = $request->only('NRO_RESOLUCION', 'FECHA', 'ID_TIPO', 'ID_FIRMANTE', 'ID_FACULTAD', 'ID_DELEGADO', 'OBSERVACIONES');
    
            if ($request->hasFile('DOCUMENTO')) {
                $documento = $request->file('DOCUMENTO');
            
                // Genera un nombre único para el archivo PDF
                $nombreArchivo = uniqid() . '.' . $documento->getClientOriginalExtension();
            
                // Guarda el archivo PDF en la carpeta 'resoluciones' dentro del disco 'public'
                $documento->storeAs('resoluciones', $nombreArchivo, 'public');
            
                $data['DOCUMENTO'] = $nombreArchivo;
            }
    
            Resolucion::create($data);
    
            session()->flash('success', 'La resolución delegatoria fue agregada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al agregar la resolución delegatoria. Vuelva a intentarlo nuevamente' . $e->getMessage());
        }
    
        return redirect(route('resolucion.index'));
    }

    /**
     * Display the specified resource.
     *///Accede a un único registro
    public function show(string $id)
    {
        try{
            $resolucion = Resolucion::with('tipo', 'firmante', 'delegado', 'facultad')->find($id);
            return view('resolucion.show', compact('resolucion'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder a la resolución delegatoria seleccionada, vuelva a intentarlo más tarde.');
            return redirect(route('resolucion.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *///Carga el formulario de edicion
    public function edit(string $id)
    {
        $resolucion = Resolucion::findOrFail($id);
        $tiposResolucion = TipoResolucion::pluck('NOMBRE', 'ID_TIPO');
        $facultades = Facultad::pluck('NOMBRE', 'ID_FACULTAD');
        $firmantes = Cargo::pluck('CARGO', 'ID_CARGO');
        $delegados = Cargo::pluck('CARGO', 'ID_CARGO');

        return view('resolucion.edit', compact('resolucion', 'tiposResolucion', 'facultades', 'firmantes', 'delegados'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $resolucion = Resolucion::find($id);
            $request->validate(Resolucion::rules(), Resolucion::messages());

            $fecha = $request->input('FECHA');
            $fechaSeleccionada = strtotime($fecha);

            // Calcular la fecha de inicio (un año atrás)
            $fechaInicio = strtotime('-1 year');

            // Calcular la fecha de fin (31 días después del día actual)
            $fechaFin = strtotime('+31 days');

            if ($fechaSeleccionada < $fechaInicio || $fechaSeleccionada > $fechaFin) {
                throw new \Exception('La fecha debe ser anterior a un año a partir del día actual o hasta 31 días después del día actual');
            }

            $data = $request->only('NRO_RESOLUCION', 'FECHA', 'ID_TIPO', 'ID_FIRMANTE', 'ID_FACULTAD', 'ID_DELEGADO', 'OBSERVACIONES');
            $resolucion->fill($data);

            // Procesar el archivo adjunto si se ha seleccionado uno
            if ($request->hasFile('DOCUMENTO')) {
                //Borra el archivo existente, en caso de que exista
                if ($resolucion->DOCUMENTO) {
                    Storage::disk('public')->delete('resoluciones/' . $resolucion->DOCUMENTO);
                }
                $documento = $request->file('DOCUMENTO');

                // Genera un nombre único para el archivo PDF
                $nombreArchivo = uniqid() . '.' . $documento->getClientOriginalExtension();

                // Guarda el archivo PDF en la carpeta 'resoluciones' dentro del disco 'public'
                $documento->storeAs('resoluciones', $nombreArchivo, 'public');

                $resolucion->DOCUMENTO = $nombreArchivo;
            }

            // Verificar si se debe eliminar el archivo adjunto actual
            if ($request->has('ELIMINAR_DOCUMENTO')) {
                // Eliminar el archivo adjunto actual
                Storage::disk('public')->delete('resoluciones/' . $resolucion->DOCUMENTO);
                $resolucion->DOCUMENTO = null;
            }

            $resolucion->save();
            session()->flash('success', 'La resolución delegatoria fue modificada exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al modificar la resolución delegatoria seleccionada: ' . $e->getMessage());
        }

        return redirect(route('resolucion.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $resolucion = Resolucion::find($id);

            // Eliminar el documento asociado si existe
            if ($resolucion->DOCUMENTO) {
                Storage::disk('public')->delete('resoluciones/' . $resolucion->DOCUMENTO);
            }

            $resolucion->delete();
            session()->flash('success', 'La resolución delegatoria ha sido eliminada correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar la resolución delegatoria seleccionada, vuelva a intentarlo nuevamente.');
        }
        
        return redirect(route('resolucion.index'));
    }

    //Mostrar pdf
    public function showDocumento($filename)
    {
        $path = public_path('resoluciones/' . $filename);

        if (file_exists($path)) {
            return response()->file($path);
        }

        abort(404);
    }
}

