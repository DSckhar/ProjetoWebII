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

    public static function listarEspec($idCurso, $modulo, $idSemestre){
        $semestreDisciplinas = DB::table('semestre_disciplinas')
            ->join('semestres', 'semestres.id', '=', 'semestre_disciplinas.idSemestre')
            ->join('professores', 'professores.id', '=', 'semestre_disciplinas.idProfessor')
            ->join('disciplinas', 'disciplinas.id', '=', 'semestre_disciplinas.idDisciplina')
            ->join('cursos', 'cursos.id', '=', 'disciplinas.idCurso')
            ->where('semestre_disciplinas.idSemestre', '=', $idSemestre)
            ->where('disciplinas.idCurso', '=', $idCurso)
            ->where('disciplinas.modulo', '<=', $modulo)
            ->select('semestre_disciplinas.*', 'professores.nome as nomeProfessor', 'semestres.descricao as descricaoSemestre', 
                            'disciplinas.nome as nomeDisciplina', 'cursos.nome as nomeCurso')
            ->get();
        
        return $semestreDisciplinas;
    }

    public static function listarAlunos($idSemestreDisciplina){
        $alunos = DB::table('matricula_disciplinas')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'matricula_disciplinas.idSemestreDisciplina')
            ->join('matricula_semestres', 'matricula_semestres.id', '=', 'matricula_disciplinas.idMatriculaSemestre')
            ->join('matriculas', 'matriculas.id', '=', 'matricula_semestres.idMatricula')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idAluno')
            ->where('matricula_disciplinas.idSemestreDisciplina', '=', $idSemestreDisciplina)
            ->select('semestre_disciplinas.*', 'matricula_disciplinas.*', 'matricula_disciplinas.id as idMatriculaDisciplina', 
                    'matricula_semestres.*', 'matriculas.*',  'alunos.nome as nomeAluno')
            ->get();
        
        return $alunos;
    }

    public static function listarNotas($idSemestreDisciplina){
        $notas = DB::table('notas')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'notas.idSemestreDisciplina')
            ->where('notas.idSemestreDisciplina', '=', $idSemestreDisciplina)
            ->select('semestre_disciplinas.*', 'notas.*', 'notas.valor as nota')
            ->get();
        
        return $notas;
    }
    
}
