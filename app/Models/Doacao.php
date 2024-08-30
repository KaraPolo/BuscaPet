<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    use HasFactory;

    protected $table = "doacaos";
    //app/Models/
    protected $fillable = [
        "nome",
        "idade",
        "raca",
        "sexo",
        "caracteristicas",
        "historia",
        "saude",
        "observacao",
        "responsavel",
        "telefone",
        "imagem",
    ];

    protected $casts = [
        'categoria_id'=>'integer'
    ];

    public function categoria(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
