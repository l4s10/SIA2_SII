<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudSala;
use App\Models\Sala;
use App\Models\CategoriaSala;
use App\Models\Equipo;
//Para formatear fechas
use Carbon\Carbon;

class SolicitudSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
        //Tambien aqui podremos agregar que roles son los que pueden ingresar
    }
    public function index()
    {
        $solicitudes = SolicitudSala::all();
        return view('reservasalas.index',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaSala::all();
        return view('reservasalas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'ID_CATEGORIA_SALA' => 'required|exists:categoria_salas,ID_CATEGORIA_SALA',
            'MOTIVO_SOL_SALA' => 'required|string|max:255',
            'CANT_PERSONAS_SOL_SALAS' => 'required|integer|min:1|max:100',
            'FECHA_SOL_SALA' => 'required',
        ];

        $messages = [
            'ID_CATEGORIA_SALA.required' => 'Debe seleccionar un tipo de solicitud.',
            'ID_CATEGORIA_SALA.exists' => 'El tipo de solicitud seleccionado es inválido.',
            'MOTIVO_SOL_SALA.required' => 'El motivo de reserva es requerido.',
            'MOTIVO_SOL_SALA.max' => 'El motivo de reserva no puede tener más de :max caracteres.',
            'CANT_PERSONAS_SOL_SALAS.required' => 'La cantidad de personas es requerida.',
            'CANT_PERSONAS_SOL_SALAS.integer' => 'La cantidad de personas debe ser un número entero.',
            'CANT_PERSONAS_SOL_SALAS.min' => 'La cantidad de personas debe ser al menos :min.',
            'CANT_PERSONAS_SOL_SALAS.max' => 'La cantidad de personas no puede ser más de :max.',
            'FECHA_SOL_SALA.required' => 'La fecha de inicio es requerida.',
        ];

        $request->validate($rules,$messages);
        $data = $request->except('_token');

        $fecha = Carbon::createFromFormat('d-m-Y', $request['FECHA_SOL_SALA'])->format('Y-m-d');
        $data['FECHA_SOL_SALA'] = $fecha;
        $rut = intval(str_replace(['.', '-'], '', $request['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        try{
            SolicitudSala::create($data);
            session()->flash('success','La solicitud se ha enviado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al enviar la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect(route('reservas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $solicitud = SolicitudSala::find($id);
        return view('reservasalas.show',compact('solicitud'));
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
        return view('reservasalas.edit',compact('solicitud','equipos','salas','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $solicitud = SolicitudSala::find($id);
        $rules = [
            'EQUIPO_SALA' => 'nullable|string|max:50',
            'MOTIVO_SOL_SALA' => 'nullable|string|max:1000',
            'CANT_PERSONAS_SOL_SALAS' => 'nullable|integer',
            'FECHA_SOL_SALA' => 'nullable|date',
            'HORA_INICIO_SOL_SALA' => 'nullable|string|max:128',
            'HORA_TERM_SOL_SALA' => 'nullable|string|max:128',
            'SALA_A_ASIGNAR' => 'nullable|string|max:128',
            'ESTADO_SOL_SALA' => 'nullable|string|max:128',
            'MODIFICADO_POR_SOL_SALA' => 'nullable|string|max:128',
            'OBSERV_SOL_SALA' => 'nullable|string|max:1000',
            'ID_SALA' => 'nullable|integer|exists:salas,ID_SALA',
            'ID_TIPO_EQUIPOS' => 'nullable|integer|exists:tipo_equipos,ID_TIPO_EQUIPOS'
        ];
        $messages = [
            'EQUIPO_SALA.max' => 'El campo EQUIPO_SALA no debe tener más de 50 caracteres.',
            'MOTIVO_SOL_SALA.max' => 'El campo MOTIVO_SOL_SALA no debe tener más de 1000 caracteres.',
            'CANT_PERSONAS_SOL_SALAS.integer' => 'El campo CANT_PERSONAS_SOL_SALAS debe ser un número entero.',
            'FECHA_SOL_SALA.date' => 'El campo FECHA_SOL_SALA debe ser una fecha válida.',
            'HORA_INICIO_SOL_SALA.max' => 'El campo HORA_INICIO_SOL_SALA no debe tener más de 128 caracteres.',
            'HORA_TERM_SOL_SALA.max' => 'El campo HORA_TERM_SOL_SALA no debe tener más de 128 caracteres.',
            'SALA_A_ASIGNAR.max' => 'El campo SALA_A_ASIGNAR no debe tener más de 128 caracteres.',
            'ESTADO_SOL_SALA.max' => 'El campo ESTADO_SOL_SALA no debe tener más de 128 caracteres.',
            'MODIFICADO_POR_SOL_SALA.max' => 'El campo MODIFICADO_POR_SOL_SALA no debe tener más de 128 caracteres.',
            'OBSERV_SOL_SALA.max' => 'El campo OBSERV_SOL_SALA no debe tener más de 1000 caracteres.',
            'ID_SALA.integer' => 'El campo ID_SALA debe ser un número entero.',
            'ID_SALA.exists' => 'El campo ID_SALA no existe en la tabla salas.',
            'ID_TIPO_EQUIPOS.integer' => 'El campo ID_TIPO_EQUIPOS debe ser un número entero.',
            'ID_TIPO_EQUIPOS.exists' => 'El campo ID_TIPO_EQUIPOS no existe en la tabla tipo_equipos.'
        ];
        $request->validate($rules,$messages);
        $data = $request->except('_token');
        $fecha = Carbon::createFromFormat('d-m-Y', $request['FECHA_SOL_SALA'])->format('Y-m-d');
        $request['FECHA_SOL_SALA'] = $fecha;
        $rut = intval(str_replace(['.', '-'], '', $request['RUT']));
        $request['RUT'] = $this->formatRut($rut);
        try{
            $solicitud->update($request->all());
            session()->flash('success','La solicitud se ha modificado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Hubo un error al modificar la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect(route('reservas.index'));
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
        return redirect(route('reservas.index'));
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
