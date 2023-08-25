<?php

namespace App\Http\Controllers;

use App\Models\CategoriaSala;
use Illuminate\Http\Request;
use App\Models\SolicitudBodegas;
use App\Models\Sala;

use Illuminate\Support\Facades\Auth;

class SolicitudBodegasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRelFunWithSupportPermissions']);
        // $this->middleware(function ($request, $next) {
        //     $user = Auth::user();

        //     if ($user->hasRole('ADMINISTRADOR')) {
        //         return $next($request);
        //     } elseif ($user->hasRole('INFORMATICA')) {
        //         if ($request->route()->getActionMethod() === 'destroy') {
        //             abort(403, 'Acceso no autorizado');
        //         }
        //         return $next($request);
        //     } else {
        //         if ($request->route()->getActionMethod() !== 'index' && $request->route()->getActionMethod() !== 'create' && $request->route()->getActionMethod() !== 'store' && $request->route()->getActionMethod() !== 'show') {
        //             abort(403, 'Acceso no autorizado');
        //         }
        //         return $next($request);
        //     }
        // });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'INFORMATICA'])) {
            $solicitudes = SolicitudBodegas::all();
        } else {
            $solicitudes = SolicitudBodegas::where('ID_USUARIO', $user->id)->get();
        }

        return view('reservas.reservabodegas.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salas = Sala::all();
        $categorias = CategoriaSala::all();
        return view('reservas.reservabodegas.create',compact('salas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate(SolicitudBodegas::$rules, SolicitudBodegas::$messages);
            $data = $request->except('_token');
            SolicitudBodegas::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo mas tarde');
        }
        return redirect(route('reservas.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $solicitud = SolicitudBodegas::find($id);
        return view('reservas.reservabodegas.show',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $salas = Sala::all();
            $categorias = CategoriaSala::all();
            $solicitud = SolicitudBodegas::find($id);
            return view('reservas.reservabodegas.edit',compact('solicitud','salas','categorias'));
        }catch(\Exception $e){
            session()->flash('error','No se ha encontrado la solicitud seleccionada');
            return view('reservas.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $solicitud = SolicitudBodegas::find($id);
            $request->validate(SolicitudBodegas::$rules, SolicitudBodegas::$messages);
            //*Actualizar registro*/
            $data = $request->except('_token');
            $solicitud->update($data);
            session()->flash('success','La solicitud se ha actualizado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','No se ha podido actualizar la solicitud, vuelva a intentarlo mas tarde');
        }
        return redirect(route('reservas.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $solicitud = SolicitudBodegas::find($id);
            $solicitud->delete();
            session()->flash('success','La solicitud se ha eliminado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','No se ha encontrado la solicitud seleccionada');
        }
        return redirect(route('reservas.dashboard'));
    }
}
