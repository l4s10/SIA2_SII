<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos',$articulos);
    }

    public function create()
    {
        return view('articulo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:articulos',
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        $articulos = new Articulo();
        $articulos->codigo = $request->get('codigo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->precio = $request->get('precio');
        $articulos->save();

        return redirect()->route('articulos.index')->with('success', 'El artículo ha sido creado correctamente.');
    }

    public function edit(string $id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.edit')->with('articulo',$articulo);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'codigo' => 'required|unique:articulos,codigo,'.$id,
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        $articulo = Articulo::find($id);
        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');
        $articulo->save();

        return redirect()->route('articulos.index')->with('success', 'El artículo ha sido actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();

        return redirect()->route('articulos.index')->with('success', 'El artículo ha sido eliminado correctamente.');
    }
}