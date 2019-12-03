<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    protected $fillable = [
        'topico',
        'quant',
        'data',
        'idSemestreDisciplina'
    ];

    public static function store($aula){

        $aulas = new Aulas;

        $aulas->topico = $aula['topico'];
        $aulas->quant = $aula['quant'];
        $aulas->data = $aula['data'];
        $aulas->idSemestreDisciplina = $aula['idSemestreDisciplina'];
        $aulas->save();
    }
}
