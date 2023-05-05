<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        //*La persona debe de haber iniciado sesion */
        $this->middleware('auth');
        //*Solo entrarán los admin maestro */
        $this->middleware(function ($request, $next) {
            $adminMaestro = Role::findByName('ADMINISTRADOR_MAESTRO');
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
        return view('funcionarios.create',compact('roles'));
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
                'ID_DEPART' => 'required|string|max:255',
                'ID_REGION' => 'required|string|max:255',
                'ID_UBICACION' => 'required|string|max:255',
                'ID_GRUPO' => 'required|string|max:255',
                'ID_ESCALAFON' => 'required|string|max:255',
                'ID_GRADO' => 'required|string|max:255',
                'FECHA_NAC' => 'required|date',
                'FECHA_INGRESO' => 'required|date',
                'ID_CALIDAD_JURIDICA' => 'required|string|max:255',
                'FONO' => 'required|string|max:255',
                'ANEXO' => 'required|string|max:255',
                'ID_SEXO' => 'required|string|max:1',
            ];
            $request->validate($rules, User::$messages);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rut' => $request->rut,
                'depto' => $request->depto,
                'region' => $request->region,
                'ubicacion' => $request->ubicacion,
                'grupo' => $request->grupo,
                'escalafon' => $request->escalafon,
                'grado' => $request->grado,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_ingreso' => $request->fecha_ingreso,
                'fecha_asim_planta' => $request->fecha_asim_planta,
                'calidad_juridica' => $request->calidad_juridica,
                'funcion' => $request->funcion,
                'profesion' => $request->profesion,
                'area' => $request->area,
                'fono' => $request->fono,
                'anexo' => $request->anexo,
                'sexo' => $request->sexo,
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
            $funcionario = User::find($id);
            return view('funcionarios.edit',compact('funcionario'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$funcionario->id,
            'password' => 'nullable|string|min:8|confirmed',
            'rut' => 'required|string|max:20|unique:users,rut,'. $funcionario->id,
            'depto' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'grupo' => 'required|string|max:255',
            'escalafon' => 'required|string|max:255',
            'grado' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'fecha_asim_planta' => 'required|date',
            'funcion' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'fono' => 'required|string|max:255',
            'anexo' => 'required|string|max:255',
            'sexo' => 'required|string|max:1',
        ];
        try {
            $request->validate($rules, User::$messages);
            $data = array_filter($request->all(), 'strlen');
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
