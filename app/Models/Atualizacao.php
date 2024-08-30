<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atualizacao extends Model
{
    use HasFactory;

    protected $table = "atualizacaos";
    //app/Models/
    protected $fillable = [
        "status_id",
        "dono_id",
        "perdido_id",
        "data_atualizacao",
    ];

    protected $casts = [
        'status_id'=>'integer',
        'dono_id'=>'integer',
        'perdido_id'=>'integer',
        'data_atualizacao'=>'date',
    ];

    public function status(){

        return $this->belongsTo(Status::class, 'status_id');
    }

    public function dono(){

        return $this->belongsTo(Dono::class, 'dono_id');
    }

    public function perdido(){

        return $this->belongsTo(Perdido::class, 'perdido_id');
    }


}
