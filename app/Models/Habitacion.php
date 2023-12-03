<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitaciones';
    protected $fillable = ['sensor_magnetico', 'movimiento', 'temperatura', 'humedad', 'luz', 'voltaje'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'habitacion_id');
    }
    
}
