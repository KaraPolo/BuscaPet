<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dono extends Model
{
    use HasFactory;

    protected $table = "donos";
    //app/Models/
    protected $fillable = [
        "nome",
    ];
}
