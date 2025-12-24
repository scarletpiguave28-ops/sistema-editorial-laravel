<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'isbn',
        'paginas',
        'editorial_id',
    ];

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro');
    }
}
