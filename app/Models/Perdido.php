<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perdido extends Model
{
    use HasFactory;

    protected $table = "perdidos";
    //app/Models/
    protected $fillable = [
        "nome",
        "idade",
        "especie",
        "raca",
        "categoria_id",
        "caracteristicas",
        "porte",
        "data",
        "local",
        "responsavel",
        "telefone",
        "recompensa",
        "imagem",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
