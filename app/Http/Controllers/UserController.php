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
        //*La persona debe de haber iniciado sesion */
        $this->middleware('auth');
        //*Solo entrarán los admin maestro */
        $this->middleware(function ($request, $next) {
            $adminMaestro = Role::findByName('ADMINISTRADOR');
            if (Auth::check() && Auth::user()->hasRole($adminMaestro)) {
                return $next($request);
            }
            abort(403, 'Acción no autorizada');
        });
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
        //$departamentos = Ubicacion::all();
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
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'nullable|string|min:8|confirmed',
                'RUT' => 'required|string|max:20|unique:users',
                'ID_REGION' => 'required|numeric',
                'ID_UBICACION' => 'required|numeric',
                'ID_GRUPO' => 'required|numeric',
                'ID_ESCALAFON' => 'required|numeric',
                'ID_GRADO' => 'required|numeric',
                'ID_CARGO' => 'required|numeric',
                'FECHA_NAC' => 'required|date',
                'FECHA_INGRESO' => 'required|date',
                'ID_CALIDAD_JURIDICA' => 'required|numeric',
                'FONO' => 'required|string|max:255',
                'ANEXO' => 'required|string|max:255',
                'ID_SEXO' => 'required|numeric',
            ];
            $request->validate($rules, User::$messages);
            $user = User::create([
                'NOMBRES' => $request->NOMBRES,
                'APELLIDOS' => $request->APELLIDOS,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'RUT' => RutUtils::formatRut($request->RUT),
                'ID_REGION' => $request->ID_REGION,
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
            $fechaAsimPlanta = Carbon::parse($funcionario->fecha_asim_planta)->format('d/m/Y');
            return view('funcionarios.show', compact('funcionario','fechaNacimiento','fechaIngreso','fechaAsimPlanta'));
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
            $roles = Role::all();
            //*Recuperamos los datos y los enviamos*/
            //$departamentos = Ubicacion::all();
            $regiones = Region::all();
            $ubicaciones = Ubicacion::all();
            $grupos = Grupo::all();
            $escalafones = Escalafon::all();
            $grados = Grado::all();
            $cargos = Cargo::all();
            $calidadesJuridicas = CalidadJuridica::all();
            $sexos = Sexo::all();
            $funcionario = User::find($id);
            return view('funcionarios.edit',compact('funcionario','roles','regiones','ubicaciones','grupos','escalafones','grados','cargos','calidadesJuridicas','sexos'));
        }catch(\Exception $e){
            session()->flash('error', 'Error al acceder al funcionario seleccionado, vuelva a intentarlo más tarde.');
            return view('funcionarios.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $funcionario = User::find($id);
        //reglas de validacion de campos
        $rules = [
            'NOMBRES' => 'required|string|max:255',
            'APELLIDOS' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$funcionario->id,
            'password' => 'nullable|string|min:8|confirmed',
            'RUT' => 'required|string|max:20|unique:users,rut,'. $funcionario->id,
            'ID_REGION' => 'required|numeric',
            'ID_UBICACION' => 'required|numeric',
            'ID_GRUPO' => 'required|numeric',
            'ID_ESCALAFON' => 'required|numeric',
            'ID_GRADO' => 'required|numeric',
            'ID_CARGO' => 'required|numeric',
            'FECHA_NAC' => 'required|date',
            'FECHA_INGRESO' => 'required|date',
            'ID_CALIDAD_JURIDICA' => 'required|numeric',
            'FONO' => 'required|string|max:255',
            'ANEXO' => 'required|string|max:255',
            'ID_SEXO' => 'required|numeric',
        ];
        try {
            $request->validate($rules, User::$messages);
            $data = array_filter($request->all(), 'strlen');
            $data['RUT'] = RutUtils::formatRut($request->RUT);
            $funcionario->update($data);
            //En caso de que se decida actualizar la contraseña
            if ($request->password) {
                $funcionario->update(['password' => bcrypt($request->password)]);
            }
            // Asignación de rol
            $rolSeleccionado = $request->input('rol');
            if ($rolSeleccionado) {
                $rol = Role::findById($rolSeleccionado);
                if (!$funcionario->hasRole($rol)) {
                    $funcionario->assignRole($rol);
                }
            }
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
}



