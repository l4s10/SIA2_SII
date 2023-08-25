<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __construct()
    {
        $this->middleware(['auth' , 'roleAdminAndSupport']);
    }
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoEquipo::all();
        return view('equipos.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'MARCA_EQUIPO' => 'required|string|max:128',
            'MODELO_EQUIPO' => 'required|string|max:128',
            'ESTADO_EQUIPO' => 'required|string|max:128',
            'ID_TIPO_EQUIPOS' => 'required|integer',
        ];

        $messages = [
            'MARCA_EQUIPO.required' => 'El campo Marca es requerido.',
            'MODELO_EQUIPO.required' => 'El campo Modelo es requerido.',
            'ESTADO_EQUIPO.required' => 'El campo Estado es requerido.',
            'ID_TIPO_EQUIPOS.required' => 'El campo ID de Tipo de Equipo es requerido.',
            'ID_TIPO_EQUIPOS.integer' => 'El campo ID de Tipo de Equipo debe ser un número entero.',
        ];
        $request->validate($rules,$messages);
        $data = $request->except('_token');
        try{
            Equipo::create($data);
            session()->flash('success','El equipo fue agregado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al agregar el equipo, vuelva a intentarlo más tarde');
        }
        return redirect(route('equipos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $equipo = Equipo::findOrFail($id);
            $tipos = TipoEquipo::all();
            return view('equipos.edit', compact('equipo','tipos'));
        } catch (\Exception $e) {
            session()->flash('error', 'El equipo que desea editar no existe.');
            return redirect(route('equipos.index'));
        }
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'MARCA_EQUIPO' => 'required|string|max:128',
            'MODELO_EQUIPO' => 'required|string|max:128',
            'ESTADO_EQUIPO' => 'required|string|max:128',
            'ID_TIPO_EQUIPOS' => 'required|integer',
        ];

        $messages = [
            'MARCA_EQUIPO.required' => 'El campo Marca es requerido.',
            'MODELO_EQUIPO.required' => 'El campo Modelo es requerido.',
            'ESTADO_EQUIPO.required' => 'El campo Estado es requerido.',
            'ID_TIPO_EQUIPOS.required' => 'El campo ID de Tipo de Equipo es requerido.',
            'ID_TIPO_EQUIPOS.integer' => 'El campo ID de Tipo de Equipo debe ser un número entero.',
        ];

        $request->validate($rules, $messages);

        try {
            $equipo = Equipo::findOrFail($id);
            $equipo->update($request->all());
            session()->flash('success', 'El equipo fue actualizado exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un error al actualizar el equipo, vuelva a intentarlo más tarde.');
        }

        return redirect(route('equipos.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = Equipo::find($id);
        try{
            $request->delete();
            session()->flash('success','El equipo ha sido eliminado correctamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el equipo seleccionado, vuelva a intentarlo mas tarde');
        }
        return redirect(route('equipos.index'));
    }
}
