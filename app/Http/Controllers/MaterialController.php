<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importamos el modelo de Material
use App\Models\Material;
use App\Models\TipoMaterial;
//Importamos paquete de validacion
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class MaterialController extends Controller
{
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct()
    {
        $this->middleware(['auth', 'roleAdminAndServices']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Funcion que lista elementos de la tabla de la BDD.
        //!!MOSTRAR LOGS DE INVENTARIO + EXPORTABLE
        $materiales = Material::all();
        return view('materiales.index',compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoMaterial::all();
        return view('materiales.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Especificamos las reglas del campo
        $rules = [
            'NOMBRE_MATERIAL' => ['required', 'string', 'max:255', Rule::unique('materiales')],
            'ID_TIPO_MAT' => ['required'],
            'STOCK' => ['required', 'numeric'],
        ];

        // Especificamos los mensajes personalizados de validación
        $messages = [
            'NOMBRE_MATERIAL.required' => 'El campo Nombre material es obligatorio',
            'NOMBRE_MATERIAL.unique' => 'Este material ya existe',
            'NOMBRE_MATERIAL.string' => 'El campo Nombre material debe ser una cadena de texto',
            'ID_TIPO_MAT.required' => 'Debe seleccionar un tipo de material',
            'STOCK.required' => 'El campo STOCK es requerido',
            'STOCK.numeric' => 'El campo STOCK debe ser numérico',
        ];

        // Validamos los datos recibidos del formulario
        $request->validate($rules, $messages);

        // Creamos el nuevo material
        try {
            $material = new Material();
            $material->NOMBRE_MATERIAL = $request->NOMBRE_MATERIAL;
            $material->ID_TIPO_MAT = $request->ID_TIPO_MAT;
            $material->STOCK = $request->STOCK;
            $material->save();
            session()->flash('success', 'El material fue creado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear el material');
        }

        // Redirigimos al listado de materiales
        return redirect(route('materiales.index'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $material = Material::find($id);
        return view('materiales.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = Material::find($id);
        $tipos = TipoMaterial::all();
        return view('materiales.edit',compact('material','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Especificamos las reglas de validación para los campos
        $rules = [
            'NOMBRE_MATERIAL' => ['required', 'string', 'max:255', Rule::unique('materiales')->ignore($id,'ID_MATERIAL')],
            'ID_TIPO_MAT' => ['required'],
            'STOCK' => ['required', 'numeric'],
        ];
        $messages = [
            'NOMBRE_MATERIAL.required' => 'El campo Nombre material es obligatorio',
            'NOMBRE_MATERIAL.unique' => 'Este material ya existe',
            'NOMBRE_MATERIAL.string' => 'El campo Nombre material debe ser una cadena de texto',
            'ID_TIPO_MAT.required' => 'El campo Tipo de material es obligatorio',
            'STOCK.required' => 'El campo Stock es requerido',
            'STOCK.numeric' => 'El campo Stock debe ser numérico',
        ];

        // Validamos los campos
        // $request->merge(['ID_TIPO_MAT' => $request->ID_TIPO_MAT]);
        $request->validate($rules, $messages);

        try {
            $material = Material::find($id);
            $material->fill([
                'NOMBRE_MATERIAL' => $request->input('NOMBRE_MATERIAL'),
                'ID_TIPO_MAT' => $request->input('ID_TIPO_MAT'),
                'STOCK' => $request->input('STOCK'),
            ]);
            $material->save();
            session()->flash('success', 'El material fue modificado exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar el material seleccionado: ' . $e->getMessage());
        }
        return redirect(route('materiales.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::find($id);
        try{
            $material->delete();
            session()->flash('success','El material fue eliminado exitosamente');
        }catch(\Exception $e){
            session()->flash('error','Error al eliminar el material seleccionado');
        }
        return redirect(route('materiales.index'));
    }
    //!!FUNCION EXPORTABLE A PDF CON LIBRERIA "DOMPDF" (ESTA SE USARÁ)
    /*
        Obtenemos los materiales y los ordenamos por tipos
        Obtenemos la fecha "actual" con la que se esta generando el exportable
        Definimos el PDF cargandole la vista que contendrá la información del reporte
        Definimos el nombre del archivo (Fecha + maestro_materiales)
        Devolvemos el exportable y lo mostramos.
    */
    public function exportToPDF()
    {
        $materiales = Material::orderBy('ID_TIPO_MAT')->get();
        $fecha = Carbon::now()->setTimezone('America/Santiago')->format('d/m/Y H:i');
        $html = view('materiales.pdf', compact('materiales','fecha'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("materiales.pdf", ["Attachment" => false]);
    }
    //!!FUNCION EXPORTABLE A PDF CON LIBRERIA BARRY-DOMPDF
    /*
        Obtenemos los materiales y los ordenamos por tipos
        Obtenemos la fecha "actual" con la que se esta generando el exportable
        Definimos el PDF cargandole la vista que contendrá la información del reporte
        Definimos el nombre del archivo (Fecha + maestro_materiales)
        Devolvemos el exportable y lo mostramos.
    */
    public function report(){
        $materiales = Material::orderBy('ID_TIPO_MAT')->get();
        $fecha = Carbon::now()->format('d/m/Y H:i');
        $pdf = Pdf::loadView('materiales.report', compact('materiales', 'fecha'));
        $nombreArchivo = $fecha . '_maestro_materiales.pdf';
        return $pdf->stream($nombreArchivo);
    }


}
