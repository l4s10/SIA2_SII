<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


//*Importamos modelos de las tablas normalizadas para enviarlas a las vistas*/
// use App\Models\Departamento;
use App\Models\Region;
use App\Models\Ubicacion;
use App\Models\Grupo;
use App\Models\Escalafon;
use App\Models\Grado;
use App\Models\CalidadJuridica;
use App\Models\Sexo;
use App\Models\Cargo;
//!!WEA LOCA
use App\Models\DireccionRegional;
//*IMPORTAMOS EL UTILS DE FORMATEAR RUT */
use App\Utils\RutUtils;

class UserController extends Controller
{
    public function __construct()
    {
        // //*La persona debe de haber iniciado sesion */
        $this->middleware('auth');
        // * SI LA PERSONA ES ADMINISTRADOR TIENE ACCESO A TODOS LAS RUTAS* (le quitamos get usuarios pero se la volvemos a asignar en la siguiente)
        $this->middleware('checkearRol:ADMINISTRADOR')->except('getUsuarios');
        // * SI LA PERSONA TIENE CUALQUIER ROL, SOLO PODRAN ACCEDER AL METODO "getUsuarios" (ESTA FUNCION ES EL DESPLEGABLE DE TODAS LAS PAGINAS QUE PERMITEN SELECCIONAR USUARIOS PARA SOLICITUDES)*
        $this->middleware('checkAnyRole')->only('getUsuarios');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = User::all();

        return view('funcionarios.index',compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        //*Recuperamos los datos y los enviamos*/
        $regiones = Region::all();
        $ubicaciones = Ubicacion::all();
        $grupos = Grupo::all();
        $escalafones = Escalafon::all();
        $grados = Grado::all();
        $cargos = Cargo::all();
        $calidadesJuridicas = CalidadJuridica::all();
        $sexos = Sexo::all();
        $direcciones = DireccionRegional::all();
        return view('funcionarios.create',compact('roles','ubicaciones','regiones','grupos','escalafones','grados','calidadesJuridicas','cargos','sexos','direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $rules = [
                'NOMBRES' => 'required|string|max:255',
                'APELLIDOS' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'nullable|string',
                'RUT' => 'required|string|max:20|unique:users',
                'FECHA_NAC' => 'required|date',
                'FECHA_INGRESO' => 'required|date',
                'FONO' => 'required|string|max:255',
                'ANEXO' => 'required|string|max:255',
                'ID_UBICACION' => 'required|integer|exists:ubicacion,ID_UBICACION',
                'ID_REGION' => 'required|integer|exists:region,ID_REGION',
                'ID_GRUPO' => 'required|integer|exists:grupo,ID_GRUPO',
                'ID_ESCALAFON' => 'required|integer|exists:escalafon,ID_ESCALAFON',
                'ID_GRADO' => 'required|integer|exists:grado,ID_GRADO',
                'ID_CARGO' => 'required|integer|exists:cargos,ID_CARGO',
                'ID_CALIDAD_JURIDICA' => 'required|integer|exists:calidad_juridica,ID_CALIDAD',
                'ID_SEXO' => 'required|integer|exists:sexo,ID_SEXO',
            ];

            $messages = [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser una cadena de texto.',
                'max' => 'El campo :attribute no debe exceder los :max caracteres.',
                'unique' => 'El :attribute ya se encuentra registrado.',
                'date' => 'El campo :attribute debe ser una fecha válida.',
                'integer' => 'El campo :attribute debe ser un número entero.',
                'exists' => 'El valor seleccionado para :attribute no es válido.',
            ];

            $this->validate($request, $rules, $messages);
            // Eliminar espacios adicionales en NOMBRES y APELLIDOS antes de guardarlos
            $nombres = preg_replace('/\s+/', ' ', trim($request->NOMBRES));
            $apellidos = preg_replace('/\s+/', ' ', trim($request->APELLIDOS));

            // Asignamos la entidad_type
            $user = User::create([
                'NOMBRES' => $nombres,
                'APELLIDOS' => $apellidos,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'RUT' => RutUtils::formatRut($request->RUT),
                'ID_REGION' => $request->ID_REGION,
                // 'entidad_id' => $request->entidad_id, // Reemplaza a ID_UBICACION y ID_DEPARTAMENTO
                // 'entidad_type' => $entidad_type, // Reemplaza a ID_UBICACION y ID_DEPARTAMENTO
                'ID_UBICACION' => $request->ID_UBICACION,
                'ID_GRUPO' => $request->ID_GRUPO,
                'ID_ESCALAFON' => $request->ID_ESCALAFON,
                'ID_GRADO' => $request->ID_GRADO,
                'ID_CARGO' => $request->ID_CARGO,
                'FECHA_NAC' => $request->FECHA_NAC,
                'FECHA_INGRESO' => $request->FECHA_INGRESO,
                'ID_CALIDAD_JURIDICA' => $request->ID_CALIDAD_JURIDICA,
                'FONO' => $request->FONO,
                'ANEXO' => $request->ANEXO,
                'ID_SEXO' => $request->ID_SEXO,
            ]);
            $user->assignRole($request->role);
            session()->flash('success','El funcionario fue agregado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar al funcionario. Vuelva a intentarlo mas tarde.' .$e->getMessage());
        }
        return redirect(route('funcionarios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $funcionario = User::find($id);
             // Formatear la fecha de nacimiento a un formato específico
            $fechaNacimiento = Carbon::parse($funcionario->fecha_nacimiento)->format('d/m/Y');
            $fechaIngreso = Carbon::parse($funcionario->fecha_ingreso)->format('d/m/Y');
            return view('funcionarios.show', compact('funcionario','fechaNacimiento','fechaIngreso'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder al funcionario seleccionado, vuelva a intentarlo más tarde.');
            return view('funcionarios.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $funcionarios = User::all();
            $funcionario = User::find($id);

            if (!$funcionario) {
                throw new \Exception("Funcionario con id $id no encontrado");
            }

            $roles = Role::all();
            //*Recuperamos los datos y los enviamos*/
            $regiones = Region::all();
            $ubicaciones = Ubicacion::all();
            $grupos = Grupo::all();
            $escalafones = Escalafon::all();
            $grados = Grado::all();
            $cargos = Cargo::all();
            $calidadesJuridicas = CalidadJuridica::all();
            $sexos = Sexo::all();

            return view('funcionarios.edit',compact('funcionario','roles','regiones','ubicaciones','grupos','escalafones','grados','cargos','calidadesJuridicas','sexos'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder al funcionario seleccionado, vuelva a intentarlo más tarde. Error: ' . $e->getMessage());
            return view('funcionarios.index', compact('funcionarios'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $funcionario = User::find($id);

    // Reglas de validación de campos
    $rules = [
        'NOMBRES' => 'required|string|max:255',
        'APELLIDOS' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' .$funcionario->id,
        'password' => 'nullable|string',
        'RUT' => 'required|string|max:20|unique:users,rut,'. $funcionario->id,
        'FECHA_NAC' => 'required|date',
        'FECHA_INGRESO' => 'required|date',
        'FONO' => 'required|string|max:255',
        'ANEXO' => 'required|string|max:255',
        'ID_UBICACION' => 'required|integer|exists:ubicacion,ID_UBICACION',
        'ID_REGION' => 'required|integer|exists:region,ID_REGION',
        'ID_GRUPO' => 'required|integer|exists:grupo,ID_GRUPO',
        'ID_ESCALAFON' => 'required|integer|exists:escalafon,ID_ESCALAFON',
        'ID_GRADO' => 'required|integer|exists:grado,ID_GRADO',
        'ID_CARGO' => 'required|integer|exists:cargos,ID_CARGO',
        'ID_CALIDAD_JURIDICA' => 'required|integer|exists:calidad_juridica,ID_CALIDAD',
        'ID_SEXO' => 'required|integer|exists:sexo,ID_SEXO',
    ];

    $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'string' => 'El campo :attribute debe ser una cadena de texto.',
        'max' => 'El campo :attribute no debe exceder los :max caracteres.',
        'unique' => 'El :attribute ya se encuentra registrado.',
        'date' => 'El campo :attribute debe ser una fecha válida.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'exists' => 'El valor seleccionado para :attribute no es válido.',
    ];

    $this->validate($request, $rules, $messages);

    try {
        $data = array_filter($request->all(), 'strlen');
        $data['RUT'] = RutUtils::formatRut($request->RUT);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $funcionario->update($data);

        if($request->role){
            $funcionario->syncRoles($request->role);
        }

        $funcionario->update($data);

        session()->flash('success', 'Funcionario actualizado correctamente.');
    } catch(\Exception $e) {
        session()->flash('error', 'Error al actualizar el funcionario, vuelva a intentarlo más tarde.' . $e->getMessage());
    }

    return redirect(route('funcionarios.index'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $funcionario = User::find($id);
        try{
            $funcionario->delete();
            session()->flash('success','El funcionario ha sido eliminado correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el funcionario seleccionado, vuelva a intentarlo mas tarde.');
        }
        return redirect(route('funcionarios.index'));
    }

    public function getUsersByRegion($id) {
        error_log('Region ID: ' . $id); // Esto mostrará el ID de la región en tus logs de Laravel
        $users = User::where('ID_REGION', $id)->get();
        return response()->json($users);
    }

    public function getUsuarios($ubicacionId)
    {
        // Asume que tienes un modelo User que tiene una relación con Ubicaciones
        $usuarios = User::where('ID_UBICACION', $ubicacionId)->get();

        return response()->json($usuarios);
    }


}



