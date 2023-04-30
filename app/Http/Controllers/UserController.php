<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
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
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'nullable|string|min:8|confirmed',
                'rut' => 'required|string|max:20|unique:users',
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
            $request->validate($rules, User::$messages);
            User::create([
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
                'funcion' => $request->funcion,
                'profesion' => $request->profesion,
                'area' => $request->area,
                'fono' => $request->fono,
                'anexo' => $request->anexo,
                'sexo' => $request->sexo,
            ]);
            session()->flash('success','El funcionario fue agregado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar al funcionario. Vuelva a intentarlo mas tarde.');
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
        try{
            $request->validate($rules, User::$messages);
            $data = array_filter($request->all(), 'strlen');
            $funcionario->update($data);
            if($request->password){
                $funcionario->update(['password' => bcrypt($request->password)]);
            }
            session()->flash('success','Funcionario actualizado correctamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al actualizar el funcionario, vuelva a intentarlo más tarde.' . $e->getMessage());
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
