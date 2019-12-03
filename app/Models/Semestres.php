<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semestres extends Model
{
    protected $fillable = [
        'descricao',
    ];

    public static function store($semestre){

        $semestres = new Semestres;

        $semestres->descricao = $semestre['descricao'];
        $semestres->save();
    }
}
