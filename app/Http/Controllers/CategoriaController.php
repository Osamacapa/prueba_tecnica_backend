<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function obtenerTodos()
    {
        return response()->json(Categoria::all(), 200);
    }

    public function obtenerXId($id)
    {
        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function crear(Request $request)
    {
        $categoria = Categoria::create($request->all());
        if (is_null($categoria)) {
            return response()->json(['message' => 'Hubo un problema al crear.'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function actualizar(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        $categoria->update($request->all());
        return response()->json($categoria, 200);
    }

    public function eliminar($id)
    {
        $categoria = Categoria::find($id);
        if (is_null($categoria)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        $categoria->delete();
        return response()->json(['message' => 'Registro eliminado.'], 200);
    }
}
