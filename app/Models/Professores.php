<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professores extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'titulacao',
        'salario'
    ];

    public static function store($professor){

        $professores = new Professores;

        $professores->nome = $professor['nome'];
        $professores->email = $professor['email'];
        $professores->titulacao = $professor['titulacao'];
        $professores->salario = $professor['salario'];
        $professores->save();
    }
}
