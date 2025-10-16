<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Producto::query()
        ->withCount('categoria')
        ->orderBy('id','desc')
        ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = $request->validate([
            'categoria_Id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255|unique:productos,nombre',
            'sku' => 'required|string|max:100|unique:productos,sku',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'activo' => 'boolean'
        ]);


        $producto = Producto::create($producto);
        return response() -> json($producto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        return $producto -> load('categoria');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $productos = $request->validate([
            'categoria_Id' => 'required|exists:categorias,id',
            'nombre' => 'sometimes|required|string|max:255|unique:productos,nombre',
            'sku' => 'sometimes|required|string|max:100|unique:productos,sku',
            'precio' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'activo' => 'sometimes|boolean'
        ]);
        $producto->update($productos);
        return response() ->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
