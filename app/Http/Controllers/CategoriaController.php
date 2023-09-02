<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $head = [
            'Codigo',
            'Nombre',
             'Descripcion',
             'Estado',
        ];
        $categoria=DB::table('categorias')->get();

        return view('categoria',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $categoria = new Categoria();
       $categoria->nombre = $request->nombre;
       $categoria->descripcion = $request->descripcion;
       $categoria->estado = 'A';
       $categoria->save();
       return Redirect::to("categoria");

    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_categoria)
    {
     //   $id_categoria = $request->input('id_categoria');
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = 'A';
        $categoria->save();
        return Redirect::to("categoria");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $categoria = Categoria::findOrFail($request->cod_categoria);
        if ($categoria->estado == 'A') {
            $categoria->estado == 'I';
            $categoria->save();
        }else{
            $categoria->estado == 'A';
            $categoria->save();
        }
    }
}
