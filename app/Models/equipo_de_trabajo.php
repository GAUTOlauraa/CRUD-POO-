<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo_de_trabajo extends Model
{
    use HasFactory;
    public function ordenesDeTrabajo()
    {
        return $this->hasMany(orden_de_trabajo::class);
    }
}
