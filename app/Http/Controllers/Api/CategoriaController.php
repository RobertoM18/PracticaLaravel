<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Http\Response;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consultar todos los registros que existen en la tabla categorias
        return Categoria::query()
        ->withCount('productos')
        ->orderBy('id', 'desc')
        ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar la data que nos envian el cliente
        //$data es igual a una variable(puede ser cualquier otro nombre)
        //nullable = nulo
        $data = $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        //agregar o crear el registro como tan en la BD
        //categoria es la variable que almacena el registro creado
        //categoria::create es el metodo que crea el registro
        //($data) es la variable donde estan validados los datos
        $categoria = Categoria::create($data);
        //retornar una respuesta al cliente
        //response() es un helper de laravel que nos permite crear respuestas HTTP
        //json() es un metodo que convierte la respuesta en formato JSON
        //($categoria) es la variable que contiene el registro creado
        //(Response::HTTP_CREATED) es el codigo de estado HTTP 201 que indica que el
        return response() -> json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
        return $categoria->load('productos');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string',
            'activo' => 'boolean'
        ]);

        $categoria->update($data);

        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoria)
    {
        //
        $cat=Categoria::find($categoria);
        $cat->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
