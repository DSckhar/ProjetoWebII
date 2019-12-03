<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Frequencias extends Model
{
    protected $fillable = [
        'falta',
        'idAula',
        'idMatriculaDisciplina'
    ];

    public static function store($data){

        $alunos = $data['idMatriculaDisciplina'];
        $faltas = $data['faltas'];
        $cont = count($alunos);

        for ($i = 0; $i < $cont; $i++) {

            $frequencias = new Frequencias;

            $frequencias->falta = $faltas[$i];
            $frequencias->idAula = $data['idAula'];
            $frequencias->idMatriculaDisciplina = $alunos[$i];
            $frequencias->save();
        }
    }

    public static function listar($idSemestreDisciplina){
        $alunos = DB::table('frequencias')
            ->join('aulas', 'aulas.id', '=', 'frequencias.idAula')
            ->join('matricula_disciplinas', 'matricula_disciplinas.id', '=', 'frequencias.idMatriculaDisciplina')
            ->join('matricula_semestres', 'matricula_semestres.id', '=', 'matricula_disciplinas.idMatriculaSemestre')
            ->join('matriculas', 'matriculas.id', '=', 'matricula_semestres.idMatricula')
            ->join('alunos', 'alunos.id', '=', 'matriculas.idAluno')
            ->join('semestre_disciplinas', 'semestre_disciplinas.id', '=', 'matricula_disciplinas.idSemestreDisciplina')
            ->where('aulas.idSemestreDisciplina', '=', $idSemestreDisciplina)
            ->select('frequencias.*', 'aulas.id as idAula', 'aulas.quant as maxFalta', 'alunos.nome as nomeAluno')
            ->get();
        
        return $alunos;
    }

}
