<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Matriculas extends Model
{
    protected $fillable = [
        'idAluno',
        'idCurso',
        'valor'
    ];

    public static function store($matricula){

        $matriculas = new Matriculas;

        $matriculas->idAluno = $matricula['idAluno'];
        $matriculas->idCurso = $matricula['idCurso'];
        $matriculas->valor = $matricula['valor'];
        $matriculas->save();
    }

    public static function listar(){
        $matriculas = DB::table('matriculas')
            ->join('cursos', 'cursos.id', '=', 'matriculas.idCurso')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idAluno')
            ->select('matriculas.*', 'cursos.nome as nomeCurso', 'alunos.nome as nomeAluno')
            ->get();
        
        return $matriculas;
    }
}
