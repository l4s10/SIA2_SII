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
        $request->validate([
            'NOMBRE_SOLICITANTE' => 'required',
            'RUT' => 'required',
            'DEPTO' => 'required',
            'EMAIL' => 'required|email',
            'TIPO_MAT_SOL' => 'required',
            'MATERIAL_SOL' => 'required',
        ]);
        $data = $request->except('_token');
        SolicitudMateriales::create($data);
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
