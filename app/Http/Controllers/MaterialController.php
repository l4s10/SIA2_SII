<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importamos el modelo de Material
use App\Models\Material;
use App\Models\TipoMaterial;
use App\Models\MovimientoMaterial;
//Importando otros modelos
use App\Models\Ubicacion;
use App\Models\DireccionRegional;
//Importamos paquete de validacion
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        // Cargar direccion regional automáticamente a través de usuario
        $ubicacionUser = Ubicacion::findOrFail(Auth::user()->ID_UBICACION);
        $direccionFiltradaId = $ubicacionUser->direccion->ID_DIRECCION;
        $direccionFiltradaNombre = $ubicacionUser->direccion->DIRECCION;
        //Funcion que lista elementos
        $materiales = Material::where('ID_DIRECCION', $direccionFiltradaId)->get();
        return view('materiales.index',compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cargar direccion regional automáticamente a través de usuario
        $ubicacionUser = Ubicacion::findOrFail(Auth::user()->ID_UBICACION);
        $direccionFiltradaId = $ubicacionUser->direccion->ID_DIRECCION;
        $direccionFiltradaNombre = $ubicacionUser->direccion->DIRECCION;

        // Filtrar tipos de material por la direccion del usuario
        $tipos = TipoMaterial::where('ID_DIRECCION', $direccionFiltradaId)->get();

        return view('materiales.create',compact('tipos','direccionFiltradaId','direccionFiltradaNombre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //??Convertimos el nombre del material a mayúsculas
        $request->merge(['NOMBRE_MATERIAL' => strtoupper($request->NOMBRE_MATERIAL)]);

        // Especificamos las reglas del campo
        $rules = [
            'NOMBRE_MATERIAL' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'ID_TIPO_MAT' => ['required', 'exists:tipo_material,ID_TIPO_MAT'],
            'STOCK' => ['required', 'numeric', 'between:0,1000'],
            'DETALLE_MOVIMIENTO' => ['required', 'string', 'max:1000', 'regex:/^[^<>]*$/'],
            'ID_DIRECCION' => ['required', 'exists:direcciones_regionales,ID_DIRECCION'],
        ];

        // Especificamos los mensajes personalizados de validación
        $messages = [
            'NOMBRE_MATERIAL.required' => 'El campo Nombre material es obligatorio',
            'NOMBRE_MATERIAL.string' => 'El campo Nombre material debe ser una cadena de texto',
            'NOMBRE_MATERIAL.regex' => 'El campo Nombre material no puede contener etiquetas HTML',
            'ID_TIPO_MAT.required' => 'Debe seleccionar un tipo de material',
            'ID_TIPO_MAT.exists' => 'El tipo de material seleccionado no es válido',
            'STOCK.required' => 'El campo STOCK es requerido',
            'STOCK.numeric' => 'El campo STOCK debe ser numérico',
            'STOCK.between' => 'El campo STOCK debe ser un número entre 0 y 1000',
            'DETALLE_MOVIMIENTO.required' => 'El detalle del movimiento es obligatorio',
            'DETALLE_MOVIMIENTO.string' => 'El detalle del movimiento debe ser una cadena de texto',
            'DETALLE_MOVIMIENTO.regex' => 'El detalle del movimiento no puede contener caracteres especiales',
            'ID_DIRECCION.required' => 'Debe seleccionar una dirección regional',
            'ID_DIRECCION.exists' => 'La dirección regional seleccionada no es válida',
        ];

        // Validamos los datos recibidos del formulario
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('materiales.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Creamos el nuevo material (hacemos el try catch para material)
        try {
            $newMaterial = Material::create($request->all());

            // Si el material se crea exitosamente, registramos el movimiento
            if ($newMaterial) {
                $data = [
                    'ID_MATERIAL' => $newMaterial->ID_MATERIAL,
                    'ID_MODIFICANTE' => Auth::user()->id,
                    'TIPO_MOVIMIENTO' => 'INGRESO',
                    'STOCK_PREVIO' => 0, // Como es un nuevo material, asumimos que el stock previo es 0
                    'STOCK_NUEVO' => $request->input('STOCK'),
                    'FECHA_PROGRAMADA' => Carbon::now(),
                    'DETALLE_MOVIMIENTO' => $request->input('DETALLE_MOVIMIENTO')
                ];
                //Hacemos el try catch para el movimiento del material
                try {
                    MovimientoMaterial::create($data);
                    session()->flash('success', 'El material fue creado exitosamente');
                } catch (\Exception $e) {
                    session()->flash('error', 'El material se creó, pero hubo un error al crear el registro de movimiento');
                    // Para un manejo más detallado en desarrollo puedes usar:
                    // session()->flash('error', 'Error al crear el registro de movimiento: ' . $e->getMessage());
                }
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear el material');
            // Para un manejo más detallado en desarrollo puedes usar:
            // session()->flash('error', 'Error al crear el material: ' . $e->getMessage());
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
        //$tipos = TipoMaterial::all();
        // Tipos por dirección regional.
        $tipos = TipoMaterial::where('ID_DIRECCION', auth()->user()->cargo->ID_DIRECCION)
            ->get();

        return view('materiales.edit',compact('material','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Especificamos las reglas de validación para los campos
        $rules = [
            'NOMBRE_MATERIAL' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s]+$/', Rule::unique('materiales')->ignore($id,'ID_MATERIAL')],
            'ID_TIPO_MAT' => ['required'],
            'STOCK' => ['required', 'numeric'],
            'STOCK_NUEVO' => ['required', 'numeric', 'between:0,1000'],
            'TIPO_MOVIMIENTO' => 'required|string|max:10',
            'DETALLE_MOVIMIENTO' => ['required', 'string', 'max:1000', 'regex:/^[^<>]*$/']
        ];
        $messages = [
            'NOMBRE_MATERIAL.required' => 'El campo Nombre material es obligatorio',
            'NOMBRE_MATERIAL.unique' => 'Este material ya existe',
            'NOMBRE_MATERIAL.string' => 'El campo Nombre material debe ser una cadena de texto',
            'ID_TIPO_MAT.required' => 'El campo Tipo de material es obligatorio',
            'STOCK.required' => 'El campo Stock es requerido',
            'STOCK.numeric' => 'El campo Stock debe ser numérico',
            'STOCK_NUEVO.required' => 'El campo Stock nuevo es requerido',
            'STOCK_NUEVO.numeric' => 'El campo Stock nuevo debe ser numérico',
            'STOCK_NUEVO.between' => 'El campo STOCK debe ser un número entre 0 y 1000',
            'TIPO_MOVIMIENTO.required' => 'El campo Tipo de movimiento es obligatorio',
            'DETALLE_MOVIMIENTO.required' => 'El detalle del movimiento es obligatorio',
            'DETALLE_MOVIMIENTO.string' => 'El detalle del movimiento debe ser una cadena de texto',
            'DETALLE_MOVIMIENTO.regex' => 'El detalle del movimiento no puede contener caracteres especiales',
        ];

        // Validamos la request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('materiales.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        //Guardamos los cambios de material
        try {
            $material = Material::find($id);
            //Upper para el nombre del material
            $material->NOMBRE_MATERIAL = strtoupper($request->input('NOMBRE_MATERIAL'));
            $stock_previo = $material->STOCK;

            // Cambiamos el valor de STOCK por el de STOCK_NUEVO antes de actualizar
            $dataToUpdate = $request->all();
            if($dataToUpdate['TIPO_MOVIMIENTO']=='INGRESO'){
                $dataToUpdate['STOCK'] = $dataToUpdate['STOCK'] + $dataToUpdate['STOCK_NUEVO'];
            }elseif(($dataToUpdate['TIPO_MOVIMIENTO']=='TRASLADO')||($dataToUpdate['TIPO_MOVIMIENTO']=='MERMA')){
                $dataToUpdate['STOCK'] = $dataToUpdate['STOCK'] - $dataToUpdate['STOCK_NUEVO'];
            }

            //$dataToUpdate['STOCK'] = $dataToUpdate['STOCK'] - $dataToUpdate['STOCK_NUEVO'];
            //$dataToUpdate['STOCK'] = $dataToUpdate['STOCK_NUEVO'];
            $material->update($dataToUpdate);

            // Registrar el movimiento
            $data = [
                'ID_MATERIAL' => $material->ID_MATERIAL,
                'ID_MODIFICANTE' => Auth::user()->id,
                'TIPO_MOVIMIENTO' => $request->input('TIPO_MOVIMIENTO'),
                'STOCK_PREVIO' => $stock_previo,
                'STOCK_NUEVO' => $request->input('STOCK_NUEVO'),
                'DETALLE_MOVIMIENTO' => $request->input('DETALLE_MOVIMIENTO')
            ];
            MovimientoMaterial::create($data);

            session()->flash('success', 'El material y su movimiento asociado fueron modificados y guardados exitosamente');
        } catch(\Exception $e) {
            session()->flash('error', 'Error al modificar el material y/o su movimiento: verifique el stock registrado');
            // session()->flash('error', 'Error al modificar el material y/o su movimiento: ' . $e->getMessage());
        }
        return redirect(route('materiales.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Verifica si hay registros de movimientos asociados a este material
        // if ($material->movimientos && $material->movimientos->count() > 0) {
        //     session()->flash('error', 'No se puede eliminar el material ya que tiene registros de movimientos asociados.');
        //     return redirect(route('materiales.index'));
        // }

        try {
            $material = Material::find($id);
            $material->delete();
            session()->flash('success', 'El material fue eliminado exitosamente');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar el material seleccionado');
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
