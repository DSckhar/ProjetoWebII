<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Disciplinas extends Model
{
    protected $fillable = [
        'nome',
        'valor',
        'idCurso',
    ];

    public static function store($disciplina){

        $disciplinas = new Disciplinas;

        $disciplinas->nome = $disciplina['nome'];
        $disciplinas->valor = $disciplina['valor'];
        $disciplinas->idCurso = $disciplina['idCurso'];
        $disciplinas->save();
    }

    public static function listar(){
        $disciplinas = DB::table('disciplinas')
            ->join('cursos', 'cursos.id', '=', 'disciplinas.idCurso')
            ->select('disciplinas.*', 'cursos.nome as nomeCurso')
            ->get();
        
        return $disciplinas;
    }
}
