<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Para implementar algunas cosas es necesario importar el modelo, en este caso el modelo Articulo
use App\Models\Articulo;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ArticuloController extends Controller
{
    // Esta funcion protege nuestro controlador para que solo las personas logueadas puedan entrar
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Esta instruccion nos trae TODOS LOS REGISTROS de la tabla de la BDD.
        //Lo guardamos en una variable llamada articulos.
        //retornamos la vista Index de la carpeta Articulos, pero agregando la instruccion "->with" para enviar los datos de $articulos.
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos',$articulos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Creamos una instancia de articulos, y vamos seteando valores segun lo obtenido del request (al dar click en boton submit).
        $articulos = new Articulo();
        $articulos->codigo = $request->get('codigo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');
        //Una vez seteados, guardamos con la siguiente instruccion.
        $articulos->save();
        return  redirect('/articulos');
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
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Creamos una instancia de articulos, y vamos seteando valores segun lo obtenido del request (al dar click en boton submit).
        $articulo = Articulo::find($id);

        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');
        //Una vez seteados, guardamos con la siguiente instruccion.
        $articulo->save();
        return  redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Creamos una instancia de articulos y llamamos la funcion borrar
        $articulo = Articulo::find($id);
        $articulo->delete();

        return  redirect('/articulos');
    }
}
