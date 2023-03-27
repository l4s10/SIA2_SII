<?php

namespace App\Http\Controllers;

use App\Models\SolicitudFormulario;
use App\Models\Formulario;
use Illuminate\Http\Request;

class SolicitudFormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = SolicitudFormulario::all();
        return view ('solicitudformularios.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formularios = Formulario::all();
        return view('solicitudformularios.create',compact('formularios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Definincion de expresiones regulares
        $rules = [
            'NOMBRE_SOLICITANTE' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zñÑ\s]+$/u'],
            'RUT' => 'required|regex:/^[0-9.-]+$/|min:7|max:12',
            'DEPTO' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'EMAIL' => 'required|email',
        ];

        $messages = [
            'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del solicitante es obligatorio.',
            'NOMBRE_SOLICITANTE.string' => 'El campo Nombre del solicitante debe ser una cadena de caracteres.',
            'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del solicitante no puede tener más de 255 caracteres.',
            'NOMBRE_SOLICITANTE.regex' => 'El campo Nombre del solicitante solo puede contener letras y espacios.',
            'RUT.required' => 'El campo RUT es obligatorio.',
            'RUT.regex' => 'El campo RUT solo debe contener números, puntos y guiones.',
            'RUT.min' => 'El campo RUT debe tener al menos 7 caracteres.',
            'RUT.max' => 'El campo RUT no puede tener más de 12 caracteres.',
            'DEPTO.required' => 'El campo Departamento es obligatorio.',
            'DEPTO.string' => 'El campo Departamento debe ser una cadena de caracteres.',
            'DEPTO.max' => 'El campo Departamento no puede tener más de 255 caracteres.',
            'DEPTO.regex' => 'El campo Departamento solo puede contener letras y espacios.',
            'EMAIL.required' => 'El campo Email es obligatorio.',
            'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
        ];
        $request->validate($rules,$messages);
        $data = $request->except('_token');
        //Funcion para formatear rut
        $rut = intval(str_replace(['.', '-'], '', $data['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        //Guardar en BDD.
        try{
            SolicitudFormulario::create($data);
            session()->flash('success','La solicitud de formulario ha sido enviada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al enviar la solicitud, vuelva a enviarlo más tarde.');
        }
        return redirect('/formularios');
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitudFormulario $solicitudFormulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudFormulario $solicitudFormulario)
    {
        //
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
