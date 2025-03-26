<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['asignatura_id', 'tipo', 'calificacion', 'fecha', 'calificacion_opcional'];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}
