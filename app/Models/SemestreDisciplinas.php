<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SemestreDisciplinas extends Model
{
    protected $fillable = [
        'idSemestre',
        'idDisciplina',
        'idProfessor'
    ];

    public static function store($semestreDisciplina){

        $semestreDisciplinas = new SemestreDisciplinas;

        $semestreDisciplinas->idSemestre = $semestreDisciplina['idSemestre'];
        $semestreDisciplinas->idDisciplina = $semestreDisciplina['idDisciplina'];
        $semestreDisciplinas->idProfessor = $semestreDisciplina['idProfessor'];
        $semestreDisciplinas->save();
    }

    public static function listar(){
        $semestreDisciplinas = DB::table('semestre_disciplinas')
            ->join('semestres', 'semestres.id', '=', 'semestre_disciplinas.idSemestre')
            ->join('professores', 'professores.id', '=', 'semestre_disciplinas.idProfessor')
            ->join('disciplinas', 'disciplinas.id', '=', 'semestre_disciplinas.idDisciplina')
            ->join('cursos', 'cursos.id', '=', 'disciplinas.idCurso')
            ->select('semestre_disciplinas.*', 'professores.nome as nomeProfessor', 'semestres.descricao as descricaoSemestre', 'disciplinas.nome as nomeDisciplina', 'cursos.nome as nomeCurso')
            ->get();
        
        return $semestreDisciplinas;
    }
    
}
