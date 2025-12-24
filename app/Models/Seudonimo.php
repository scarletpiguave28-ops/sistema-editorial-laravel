<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seudonimo extends Model
{
    protected $fillable = [
        'nombre_pluma',
        'autor_id',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
