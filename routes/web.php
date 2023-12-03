<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabitacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/habitacion', [HabitacionController::class, 'index']);
Route::get('/habitacion/{id}', [HabitacionController::class, 'detalle']);



Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba', function () {
    return "Prueba servidor";
});

