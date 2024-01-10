<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudSala;
use App\Models\Sala;
use App\Models\CategoriaSala;
use App\Models\Equipo;
use App\Models\TipoEquipo;
//Para formatear fechas
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SolicitudSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'checkRelFunWithSupportPermissions']);

    }
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['ADMINISTRADOR', 'INFORMATICA'])) {
            $solicitudes = SolicitudSala::all();
        } else {
            $solicitudes = SolicitudSala::where('ID_USUARIO', $user->id)->get();
        }

        return view('reservas.reservasalas.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //*Listamos todas las salas, categorias y tipos de equipos*/
        $salas = Sala::all();
        $categorias = CategoriaSala::all();
        $tipos = TipoEquipo::all();
        return view('reservas.reservasalas.create',compact('categorias','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ID_USUARIO' => 'required|exists:App\Models\User,id',
            'NOMBRE_SOLICITANTE' => 'required|string|max:128|regex:/^[a-zA-Z\s]*$/',
            'RUT' => 'required|string|max:128|regex:/^[0-9kK-]*$/',
            'DEPTO' => 'required|string|max:128|regex:/^[a-zA-Z\s]*$/',
            'EMAIL' => 'required|email|max:128',
            'ID_CATEGORIA_SALA' => 'required|exists:App\Models\CategoriaSala,ID_CATEGORIA_SALA',
            'EQUIPO_SALA' => 'nullable|string', //Equipo solicitado elimina regex porque falta coma
            'MOTIVO_SOL_SALA' => 'required|string|max:1000|regex:/^[a-zA-Z0-9\s]*$/',
            'CANT_PERSONAS_SOL_SALAS' => 'required|integer',
            'FECHA_SOL_SALA' => 'required|string|regex:/^[a-zA-Z0-9\s\-]*$/',
            'HORA_SOL_SALA' => 'required|string|max:128|regex:/^[0-9:]*$/',
            'HORA_TERM_SOL_SALA' => 'required|string|max:128|regex:/^[0-9:]*$/',
            'ESTADO_SOL_SALA' => 'required|string|max:128|regex:/^[a-zA-Z\s]*$/',
        ];
        $messages = [
            'ID_USUARIO.required' => 'El ID de usuario es requerido.',
            'ID_USUARIO.exists' => 'El ID de usuario es inválido.',
            'NOMBRE_SOLICITANTE.required' => 'El nombre del solicitante es requerido.',
            'NOMBRE_SOLICITANTE.max' => 'El nombre del solicitante no puede tener más de :max caracteres.',
            'RUT.required' => 'El RUT es requerido.',
            'RUT.max' => 'El RUT no puede tener más de :max caracteres.',
            'DEPTO.required' => 'El departamento es requerido.',
            'DEPTO.max' => 'El departamento no puede tener más de :max caracteres.',
            'EMAIL.required' => 'El email es requerido.',
            'EMAIL.max' => 'El email no puede tener más de :max caracteres.',
            'ID_CATEGORIA_SALA.required' => 'La categoría de la sala es requerida.',
            'ID_CATEGORIA_SALA.exists' => 'La categoría de la sala es inválida.',
            'EQUIPO_SALA.max' => 'El equipo no puede tener más de :max caracteres.',
            'MOTIVO_SOL_SALA.required' => 'El motivo de la solicitud es requerido.',
            'MOTIVO_SOL_SALA.max' => 'El motivo de la solicitud no puede tener más de :max caracteres.',
            'CANT_PERSONAS_SOL_SALAS.required' => 'La cantidad de personas es requerida.',
            'CANT_PERSONAS_SOL_SALAS.integer' => 'La cantidad de personas debe ser un número entero.',
            'FECHA_SOL_SALA.required' => 'La fecha de la solicitud es requerida.',
            'HORA_SOL_SALA.required' => 'La hora de inicio de la solicitud es requerida.',
            'HORA_SOL_SALA.max' => 'La hora de inicio de la solicitud no puede tener más de :max caracteres.',
            'HORA_TERM_SOL_SALA.required' => 'La hora de término de la solicitud es requerida.',
            'HORA_TERM_SOL_SALA.max' => 'La hora de término de la solicitud no puede tener más de :max caracteres.',
            'ESTADO_SOL_SALA.required' => 'El estado de la solicitud es requerido.',
            'ESTADO_SOL_SALA.max' => 'El estado de la solicitud no puede tener más de :max caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El nombre del solicitante solo puede contener letras y espacios.',
            'DEPTO.regex' => 'El departamento solo puede contener letras y espacios.',
            'EQUIPO_SALA.regex' => 'El equipo solo puede contener letras, números y espacios.',
            'MOTIVO_SOL_SALA.regex' => 'El motivo de la solicitud solo puede contener letras, números y espacios.',
            'HORA_SOL_SALA.regex' => 'La hora de inicio de la solicitud solo puede contener números y dos puntos.',
            'HORA_TERM_SOL_SALA.regex' => 'La hora de término de la solicitud solo puede contener números y dos puntos.',
            'ESTADO_SOL_SALA.regex' => 'El estado de la solicitud solo puede contener letras y espacios.',
        ];
        //Llamamos a las reglas y validaciones desde el modelo SolicitudSala.php
        $request->validate($rules, $messages);
        $data = $request->except('_token');
        try{
            SolicitudSala::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect(route('reservas.dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $solicitud = SolicitudSala::find($id);
        return view('reservas.reservasalas.show',compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $solicitud = SolicitudSala::find($id);
        $equipos = Equipo::all();
        $salas = Sala::all();
        $categorias = CategoriaSala::all();
        $tipos = TipoEquipo::all();
        return view('reservas.reservasalas.edit',compact('solicitud','equipos','salas','categorias','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'FECHA_INICIO_ASIG_SALA' => 'nullable|string|regex:/^[a-zA-Z0-9\s\-\:]*$/',
            'FECHA_TERM_ASIG_SALA' => 'nullable|string|regex:/^[a-zA-Z0-9\s\-\:]*$/',
            'SALA_A_ASIGNAR' => 'nullable|string|max:128|regex:/^[a-zA-Z0-9\s\(\)_]*$/|exists:App\Models\Sala,NOMBRE_SALA',
            'MODIFICADO_POR_SOL_SALA' => 'nullable|string|max:128|regex:/^[a-zA-Z\s]*$/',
            'OBSERV_SOL_SALA' => 'nullable|string|max:1000|regex:/^[a-zA-Z0-9\s]*$/',
        ];
        $messages = [
            'FECHA_INICIO_ASIG_SALA.regex' => 'La fecha de inicio de asignación solo puede contener letras, números y espacios.',
            'FECHA_TERM_ASIG_SALA.regex' => 'La fecha de término de asignación solo puede contener letras, números y espacios.',
            'SALA_A_ASIGNAR.max' => 'La sala a asignar no puede tener más de :max caracteres.',
            'SALA_A_ASIGNAR.exists' => 'La sala a asignar es inválida.',
            'SALA_A_ASIGNAR.regex' => 'La sala a asignar solo puede contener letras, números y espacios.',
            'MODIFICADO_POR_SOL_SALA.max' => 'El nombre del usuario que modificó la solicitud no puede tener más de :max caracteres.',
            'OBSERV_SOL_SALA.max' => 'La observación de la solicitud no puede tener más de :max caracteres.',
            'OBSERV_SOL_SALA.regex' => 'La observación de la solicitud solo puede contener letras, números y espacios.',

        ];
        $solicitud = SolicitudSala::find($id);
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $solicitud->update($request->all());
            session()->flash('success','La solicitud se ha modificado exitosamente');
        } catch(\Exception $e) {
            session()->flash('error','Hubo un error al modificar la solicitud, vuelva a intentarlo más tarde.');
        }

        return redirect(route('reservas.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request = SolicitudSala::find($id);
        try{
            $request->delete();
            session()->flash('success','La solicitud se ha eliminado exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar la solicitud seleccionada, vuelva a intentarlo más tarde');
        }
        return redirect(route('reservas.dashboard'));
    }
    public function getAllSolicitudes()
    {
        $solicitudes = SolicitudSala::all();
        return response()->json($solicitudes);
    }

    public function getSolicitudesByDates(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $solicitudes = SolicitudSala::whereBetween('FECHA_SOL_SALA', [$startDate, $endDate])->get();
        return response()->json($solicitudes);
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
