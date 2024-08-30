<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encontrado extends Model
{
    use HasFactory;

    protected $table = "encontrados";
    //app/Models/
    protected $fillable = [
        "caracteristicas",
        "saude",
        "telefone",
        "categoria_id",
        "imagem",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
