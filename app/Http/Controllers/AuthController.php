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
    
            // habitaciones del usuario
            $habitaciones = Habitacion::where('id', $usuario->id)->get(['id']);
    
            if ($habitaciones->isNotEmpty()) {
                // Mapea las habitaciones para obtener solo el campo 'id'
                $habitacionesIds = $habitaciones->pluck('id')->toArray();
    
                return response()->json(['Habitaciones' => $habitacionesIds]);
            } else {
                return response()->json(['success' => false, 'message' => 'El usuario no tiene habitaciones asignadas'], 404);
            }
        }
    
        return response()->json(['success' => false, 'message' => 'Credenciales inválidas'], 401);
    }
    
}