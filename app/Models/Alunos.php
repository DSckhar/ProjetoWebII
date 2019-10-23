<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $fillable = [
        'nome',
        'nascimento',
        'email',
    ];

    public static function store($aluno){

        $alunos = new Alunos;

        $alunos->nome = $aluno['nome'];
        $alunos->nascimento = $aluno['nascimento'];
        $alunos->email = $aluno['email'];
        $alunos->save();
    }}
