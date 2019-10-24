<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SemestreDisciplinas extends Model
{
    protected $fillable = [
        'idSemestre',
        'idDisciplina',
    ];

    public static function store($semestreDisciplina){

        $semestreDisciplinas = new SemestreDisciplinas;

        $semestreDisciplinas->idSemestre = $semestreDisciplina['idSemestre'];
        $semestreDisciplinas->idDisciplina = $semestreDisciplina['idDisciplina'];
        $semestreDisciplinas->save();
    }

    public static function listar(){
        $semestreDisciplinas = DB::table('semestre_disciplinas')
            ->join('semestres', 'semestres.id', '=', 'semestre_disciplinas.idSemestre')
            ->join('disciplinas', 'disciplinas.id', '=', 'semestre_disciplinas.idDisciplina')
            ->join('cursos', 'cursos.id', '=', 'disciplinas.idCurso')
            ->select('semestre_disciplinas.*', 'semestres.descricao as descricaoSemestre', 'disciplinas.nome as nomeDisciplina', 'cursos.nome as nomeCurso')
            ->get();
        
        return $semestreDisciplinas;
    }
    
}
