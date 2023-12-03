<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    public function index()
{
    $habitaciones = Habitacion::all(['id'])->toArray();

    return response()->json(['Habitaciones' => $habitaciones], 200);
}


    public function detalle($id)
    {
        $habitacion = Habitacion::find($id);

        if (!$habitacion) {
            return response()->json(['mensaje' => 'Habitación no encontrada'], 404);
        }

        return response()->json(['Habitacion' => $habitacion]);
    }
}
