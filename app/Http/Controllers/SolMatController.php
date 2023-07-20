<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudMateriales;
use App\Models\TipoMaterial;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InventoryController; // Importa la clase InventoryController

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
            'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255'],
            'EMAIL' => 'required|email',
            'MATERIAL_SOL' => 'required|max:1000',
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
        ];

        $request->validate($rules, $messages);

        $data = $request->except('_token');
        // Formatear el RUT antes de almacenarlo en la base de datos
        $rut = intval(str_replace(['.', '-'], '', $data['RUT']));
        $data['RUT'] = $this->formatRut($rut);
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
            'MATERIAL_SOL' => 'required|max:1000',
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
        ];

        $request->validate($rules, $messages);
        // Formatear el RUT antes de almacenarlo en la base de datos
        $rut = intval(str_replace(['.', '-'], '', $request['RUT']));
        $request['RUT'] = $this->formatRut($rut);
        try{
            $solicitud->update($request->all());
            //verificamos si se clickeo el boton de autorizar las cantidades
            $accion = $request->input('accion');
            // Crea una instancia de InventoryController y llama al método updateStock
            if ($accion === 'autorizar_cantidad') {
                $inventoryController = new InventoryController();
                $inventoryController->updateStock($request);
            }
            session()->flash('success','Solicitud modificada exitosamente!.');
        }catch(\Exception $e){
            session()->flash('error','Error al modificar la solicitud.' .$e->getMessage());
        }
        return redirect('/solmaterial');
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
        return redirect('/solmaterial');
    }

    //-----FUNCION QUE NOS PERMITE FORMATEAR EL RUT CON  PUNTOS Y GUIÓN.------
    public function formatRut($rut) {
        $rut = preg_replace('/[^0-9kK]/', '', $rut); // Remueve todos los caracteres excepto los números y la letra K
        $dv = substr($rut, -1); // Obtiene el dígito verificador
        $rut = substr($rut, 0, -1); // Remueve el dígito verificador del número completo
        $rut_array = str_split(strrev($rut), 3); // Divide el número completo en grupos de 3 dígitos, comenzando desde el final
        $rut = implode('.', $rut_array); // Une los grupos de 3 dígitos con un punto
        return strrev($rut) . '-' . strtoupper($dv); // Retorna el RUT con guion y el dígito verificador en mayúscula
    }

}
