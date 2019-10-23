<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'duracao',
    ];

    public static function store($curso){

        $cursos = new Cursos;

        $cursos->nome = $curso['nome'];
        $cursos->valor = $curso['valor'];
        $cursos->duracao = $curso['duracao'];
        $cursos->save();
    }
}
