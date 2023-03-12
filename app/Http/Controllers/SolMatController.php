<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudMateriales;
use App\Models\TipoMaterial;
use App\Models\Material;

class SolMatController extends Controller
{
    //Funcion para acceder a las rutas SOLO SI los usuarios estan logueados
    public function __cosntruct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtenemos todos los datos de la tabla de solicitudes para mostrarlas en el index
        $sol_materiales = SolicitudMateriales::all();
        return view('solicitudmateriales.index',compact('sol_materiales'));
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
            'NOMBRE_SOLICITANTE' => 'required|string|max:255',
            'RUT' => 'required|alpha_num|min:7|max:10',
            'DEPTO' => 'required|string|max:255',
            'EMAIL' => 'required|email',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.alpha_num' => 'El campo RUT solo debe contener letras y números.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 10 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
        ];
        $request->validate($rules, $messages);

        $data = $request->except('_token');
        try{
            SolicitudMateriales::create($data);
            session()->flash('success','La solicitud de materiales ha sido enviada exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la solicitud');
        }
        return redirect('/solmaterial');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitud = SolicitudMateriales::find($id);
        return view('solicitudmateriales.edit')->with('solicitud',$solicitud);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $solicitud = SolicitudMateriales::find($id);
        $solicitud -> delete();
        return redirect('/solmaterial');
    }
}
