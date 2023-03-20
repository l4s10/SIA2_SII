<?php

namespace App\Http\Controllers;

use App\Models\RelFunRepGeneral;
use Illuminate\Http\Request;
//Agregamos el modelo de tipo de reparacion (para el desplegable)
use App\Models\TipoReparacion;

class RelFunRepGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relFunRepGeneral = RelFunRepGeneral::all();
        return view('repyman.rep_inm.index',compact('relFunRepGeneral'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_rep = TipoReparacion::all();
        return view('repyman.rep_inm.create',compact('tipos_rep'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Definimos las reglas de los campos y los mensajes de error para cada uno de ellos.
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
        //Funcion que valida nuestros datos enviados en el formulario en base a las reglas.
        $request->validate($rules, $messages);
        //Se crea la variable data que almacena los datos validados (excepto el token de verificacion)
        $data = $request->except('_token');
        // Formatear el RUT antes de almacenarlo en la base de datos
        $rut = intval(str_replace(['.', '-'], '', $data['RUT']));
        $data['RUT'] = $this->formatRut($rut);
        //Guardar en BDD.

        try{
            RelFunRepGeneral::create($data);
            session()->flash('success','La solicitud de reparacion ha sido enviada exitosamente.');
        }catch(\Exception $e){
            session()->flash('error','Error al crear la solicitud, vuelva a intentarlo más tarde.' . $e->getMessage());
        }
        return redirect('/repyman');
    }

    /**
     * Display the specified resource.
     */
    public function show(RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RelFunRepGeneral $relFunRepGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelFunRepGeneral $relFunRepGeneral)
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
