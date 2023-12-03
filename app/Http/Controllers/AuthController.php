<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['correo', 'contrasena']);

        $usuario = Usuario::where('correo', $credentials['correo'])->first();

        if ($usuario && $credentials['contrasena'] == $usuario->contrasena) {
            $habitacionId = $usuario->habitacion_id;

            // Utilizar el método find para obtener la habitación por su ID
            $habitacion = Habitacion::find($habitacionId);

            if ($habitacion) {
                return response()->json(['success' => true, 'habitacion' => $habitacion], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'Habitación no encontrada'], 404);
            }
        }

        return response()->json(['success' => false, 'message' => 'Credenciales inválidas'], 401);
    }
}