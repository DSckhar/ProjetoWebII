<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MatriculaSemestres extends Model
{
    protected $fillable = [
        'idMatricula',
        'idSemestre',
        'modulo'
    ];

    public static function store($matriculaSemestre){

        $matriculaSemestres = new MatriculaSemestres;

        $matriculaSemestres->idMatricula = $matriculaSemestre['idMatricula'];
        $matriculaSemestres->idSemestre = $matriculaSemestre['idSemestre'];
        $matriculaSemestres->modulo = $matriculaSemestre['modulo'];
        $matriculaSemestres->save();
    }

    public static function listar(){
        $matriculaSemestres = DB::table('matricula_semestres')
            ->join('matriculas', 'matriculas.id', '=', 'matricula_semestres.idMatricula')
            ->join('semestres', 'semestres.id', '=', 'matricula_semestres.idSemestre')
            ->join('cursos', 'cursos.id', '=', 'matriculas.idCurso')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idAluno')
            ->select('matriculas.*', 'matricula_semestres.*', 'semestres.descricao as descricaoSemestre', 'cursos.nome as nomeCurso', 'alunos.nome as nomeAluno')
            ->get();
        
        return $matriculaSemestres;
    }
}
