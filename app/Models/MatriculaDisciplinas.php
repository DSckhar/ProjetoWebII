<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MatriculaDisciplinas extends Model
{
    protected $fillable = [
        'media',
        'status',
        'idMatriculaSemestre',
        'idSemestreDisciplina'
    ];

    public static function store($data){
        $idSemestreDisciplinas = $data['check_list'];
        $matriculaDisciplina['idMatriculaSemestre'] = $data['idMatriculaSemestre'];

        foreach ($idSemestreDisciplinas as $idSemestreDisciplina) {
            $matriculaDisciplina['idSemestreDisciplina'] = $idSemestreDisciplina;

            $matriculaDisciplinas = new MatriculaDisciplinas;

            $matriculaDisciplinas->idMatriculaSemestre = $matriculaDisciplina['idMatriculaSemestre'];
            $matriculaDisciplinas->idSemestreDisciplina = $matriculaDisciplina['idSemestreDisciplina'];
            $matriculaDisciplinas->save();
        }
    }
    //Listar disciplinas de uma matricula semestre específico
    public static function listarMatSemestre($idMatriculaSemestre){
        $matriculaDisciplinas = DB::table('matricula_disciplinas')
            ->join('matricula_semestres', 'matricula_semestres.id', '=', 'matricula_disciplinas.idMatriculaSemestre')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'matricula_disciplinas.idSemestreDisciplina')
            ->join('disciplinas',  'disciplinas.id', '=', 'semestre_disciplinas.idDisciplina')
            ->where('matricula_disciplinas.idMatriculaSemestre', '=', $idMatriculaSemestre)
            ->select('matricula_disciplinas.*', 'matricula_semestres.*', 
                    'semestre_disciplinas.*', 'disciplinas.nome as nomeDisciplina')
            ->get();
        
        return $matriculaDisciplinas;
    }
    //Listar disciplinas aprovadas ou matriculadas de uma matricula
    public static function listarAp($idMatriculaSemestre){
        $matriculaDisciplinas = DB::table('matricula_disciplinas')
            ->join('matricula_semestres', 'matricula_semestres.id', '=', 'matricula_disciplinas.idMatriculaSemestre')
            ->join('matriculas', 'matriculas.id', '=', 'matricula_semestres.idMatricula')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'matricula_disciplinas.idSemestreDisciplina')
            ->join('disciplinas', 'disciplinas.id', '=', 'semestre_disciplinas.idDisciplina')
            ->where('matricula_disciplinas.idMatriculaSemestre', '=', $idMatriculaSemestre)
            ->where('matricula_disciplinas.status', '=', 'aprovado', 'or', 'matriculado')
            ->select('matricula_disciplinas.*', 'matriculas.*', 'matricula_semestres.*', 
                    'semestre_disciplinas.*', 'disciplinas.nome as nomeDisciplinas')
            ->get();
        
        return $matriculaDisciplinas;
    }

    public static function listarAlunos($idSemestreDisciplina){
        $alunos = DB::table('matricula_disciplinas')
            ->join('matricula_semestres', 'matricula_semestres.id', '=', 'matricula_disciplinas.idMatriculaSemestre')
            ->join('matriculas', 'matriculas.id', '=', 'matricula_semestres.idMatricula')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idAluno')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'matricula_disciplinas.idSemestreDisciplina')
            ->where('matricula_disciplinas.idSemestreDisciplina', '=', $idSemestreDisciplina)
            ->select('matricula_disciplinas.id as idMatriculaDisciplina', 'matricula_disciplinas.*', 'matriculas.*', 'matricula_semestres.*', 
                    'semestre_disciplinas.*', 'alunos.nome as nomeAluno')
            ->get();
        
        return $alunos;
    }

}
