<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Notifications\CreacionUsuarioNotificacion;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class UsuarioController extends Controller
{


    public function obtenerTodos()
    {
        return response()->json(Usuario::all(), 200);
    }

    public function obtenerXCedula($cedula)
    {
        $usuario = Usuario::firstWhere("cedula", $cedula);
        if (is_null($usuario)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        return response()->json($usuario, 200);
    }

    public function crear(Request $request)
    {
        $usuario = Usuario::create($request->all());
        if (is_null($usuario)) {
            return response()->json(['message' => 'Hubo un problema al crear.'], 404);
        }
        $usuario -> notify(new CreacionUsuarioNotificacion());
        return response()->json($usuario, 200);
    }

    public function actualizar(Request $request, $cedula)
    {
        $usuario = Usuario::firstWhere("cedula", $cedula);
        if (is_null($usuario)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        $usuario->where('cedula', $cedula)->update($request->all());
        return response()->json($usuario, 200);
    }

    public function eliminar($cedula)
    {
        $usuario = Usuario::firstWhere("cedula", $cedula);
        if (is_null($usuario)) {
            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }
        $usuario->where("cedula", $cedula)->delete();
        return response()->json(['message' => 'Registro eliminado.'], 200);
    }
}
