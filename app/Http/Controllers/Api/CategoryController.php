<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{
    // Acá vamos a traer todos los registros
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            "results" => $categories
        ], Response::HTTP_OK);
    }


    // Procedimiento para guardar, almacenar en la base de datos
    public function store(Request $request)
    {
        //validamos los datos
        $request->validate([
            "description" => 'required | unique:categories'
        ]);

        // damos de alta en la DB
        $category = Category::create([
            "description" => $request->description
        ]);

        // devolvemos una respuesta
        return response()->json([
            "result" => $category
        ], Response::HTTP_OK);
    }

 
    // Mostrar un registro
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }



    // Procedimiento para guardar las modificaciones (actualizar)
    public function update(Request $request, $id)
    {
        // validamos los datos
        $request->validate([
            'description' => 'required'
        ]);

        // actualizamos en la DB
        $category = Category::find($id);
        $category->description = $request->description;
        $category->save();

        // devolvemos una respuesta
        return response()->json([
            "result" => $category
        ], Response::HTTP_OK);
    }


    // Para eliminar un registro
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        // devolvemos una respuesta
        return response()->json([
            "result" => "registro eliminado..."
        ], Response::HTTP_OK);        
    }







/*
    // Este no lo vamos a usar, acá se envía a una plantilla donde generamos un formulario
    public function create()
    {
        //
    }

    // No lo vamos a usar, porque es para llamar a una plantilla o formulario para editar un registro
    public function edit($id)
    {
        //
    }
*/    

}
