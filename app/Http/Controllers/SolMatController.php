<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudMateriales;
use App\Models\TipoMaterial;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InventoryController; // Importa la clase InventoryController
use Carbon\Carbon;

class SolMatController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    //En este caso ADMINISTRADOR (acceso total)
    //SERVICIOS (permisos nivel 2)
    //INFORMATICA (acceso SOLO a crear solicitudes propias y verlas)
    //FUNCIONARIO (igual que INFORMATICA)
    //JURIDICO (igual que INFORMATICA)
    public function __construct()
    {
        $this->middleware(['auth', 'checkRelFunWithServicesPermissions']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'SERVICIOS'])) {
            $sol_materiales = SolicitudMateriales::all();
        } else {
            $sol_materiales = SolicitudMateriales::where('ID_USUARIO', $user->id)->get();
        }

        return view('solicitudmateriales.index', compact('sol_materiales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoMaterial::all();
        $materiales = Material::all();
        return view('solicitudmateriales.create',compact('tipos','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'NOMBRE_SOLICITANTE' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zñÑ\s]+$/u'],
            // 'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255'],
            'EMAIL' => 'required|email',
            'MATERIAL_SOL' => 'required|max:1000|regex:/^- (\d+) unidad\(es\) de ".*?" de tipo ".*?"/m',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El campo Nombre del solicitante solo puede contener letras y espacios.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.regex' => 'El campo RUT solo debe contener números, puntos y guiones.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 12 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
            'MATERIAL_SOL.required' => 'El carrito debe contener materiales',
            'MATERIAL_SOL.max' => 'El carrito no puede tener más de 1000 caracteres',
            'MATERIAL_SOL.regex' => 'El carrito debe tener el formato correcto',
        ];

        $request->validate($rules, $messages);

        $data = $request->except('_token');
        try {
            SolicitudMateriales::create($data);
            session()->flash('success', 'La solicitud de materiales ha sido enviada exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear la solicitud' .$e->getMessage());
        }
        return redirect(route('solmaterial.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sol_material = SolicitudMateriales::find($id);
        return view('solicitudmateriales.show', compact('sol_material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitud = SolicitudMateriales::find($id);
        $tipos = TipoMaterial::all();
        $materiales = Material::all();
        return view('solicitudmateriales.edit',compact('tipos','solicitud','materiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $solicitud = SolicitudMateriales::find($id);

        $rules = [
            'NOMBRE_SOLICITANTE' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zñÑ\s]+$/u'],
            'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255'],
            'EMAIL' => 'required|email',
            'MATERIAL_SOL' => 'required|max:1000|regex:/^- (\d+) unidad\(es\) de ".*?" de tipo ".*?"/m',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El campo Nombre del solicitante solo puede contener letras y espacios.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.regex' => 'El campo RUT solo debe contener números, puntos y guiones.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 12 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
            'MATERIAL_SOL.required' => 'El campo de checkout de materiales solicitados es requerido',
            'MATERIAL_SOL.max' => 'El campo de checkout de materiales solicitados no puede tener más de 1000 caracteres',
            'MATERIAL_SOL.regex' => 'El campo de checkout de materiales solicitados debe tener el formato correcto',
        ];

        $request->validate($rules, $messages);

        try{
            //Verificamos los estados para compararlos y ver si se puede guardar la fecha de atencion
            $oldEstado = $solicitud->ESTADO_SOL;
            $newEstado = $request->ESTADO_SOL;
            //Guardamos todo el formulario normalmente
            $solicitud->update($request->all());
            // Verifica si el estado ha cambiado de INGRESADO a otro estado, si es asi ya guardamos la fecha con la que se comenzo a trabajar la solicitud.
            if ($oldEstado === 'INGRESADO' && $newEstado !== 'INGRESADO' && $solicitud->FECHA_ATENCION == NULL) {
                $solicitud->update(['FECHA_ATENCION' => Carbon::now()]);
            }

            //verificamos si se clickeo el boton de autorizar las cantidades
            $accion = $request->input('accion');
            // Crea una instancia de InventoryController y llama al método updateStock
            if ($accion === 'autorizar_cantidad') {
                $inventoryController = new InventoryController();
                $inventoryController->updateStock($request);
            }
            session()->flash('success','Solicitud modificada exitosamente!.');
        }catch(\Exception $e){
            session()->flash('error','Error al modificar la solicitud.');
        }
        return redirect(route('solmaterial.index'));
    }

    public function confirmarRecepcion(Request $request, $id)
    {
        try {
            $solicitud = SolicitudMateriales::find($id);

            // Validamos que la solicitud exista
            if (!$solicitud) {
                return response()->json(['message' => 'Solicitud no encontrada'], 404);
            }

            // Validamos que se haya enviado una fecha
            $request->validate([
                'FECHA_RECEPCION' => 'required|date',
            ]);

            // Actualizamos la fecha de recepción
            $solicitud->FECHA_RECEPCION = $request->FECHA_RECEPCION;
            $solicitud->ESTADO_SOL= "TERMINADO";
            $solicitud->save();

            return response()->json(['message' => 'Fecha de recepción actualizada con éxito'], 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la fecha de recepción. ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $solicitud = SolicitudMateriales::find($id);
        try{
            $solicitud -> delete();
            session()->flash('success','La solicitud de materiales se eliminó exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la solicitud de materiales seleccionada');
        }
        return redirect(route('solmaterial.index'));
    }
}
