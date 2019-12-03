<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use BD;

class Notas extends Model
{
    protected $fillable = [
        'valor',
        'referencia',
        'idMatriculaDisciplina',
        'idSemestreDisciplina'
    ];

    public static function store($data){

        $alunos = $data['alunos'];
        $valores = $data['valores'];
        $cont = count($alunos);

        for ($i = 0; $i < $cont; $i++) {

            $notas = new Notas;

            $notas->valor = $valores[$i];
            $notas->referencia = $data['referencia'];
            $notas->idMatriculaDisciplina = $alunos[$i];
            $notas->idSemestreDisciplina = $data['idSemestreDisciplina'];
            $notas->save();
        }
    }
}
