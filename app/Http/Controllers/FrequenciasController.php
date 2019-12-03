<?php

namespace App\Http\Controllers;

use App\Models\Frequencias;
use App\Models\Aulas;
use App\Models\SemestreDisciplinas;
use App\Models\Disciplinas;
use App\Models\MatriculaDisciplinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrequenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idAula)
    {
        $user = Auth::user();

        $aula = Aulas::find($idAula);
        $disciplina = SemestreDisciplinas::find($aula['idSemestreDisciplina']);
        $disciplina = Disciplinas::find($disciplina['idDisciplina']);
        $aula['nomeDisciplina'] = $disciplina['nome'];
        $alunos = MatriculaDisciplinas::listarAlunos($aula['idSemestreDisciplina'])->sortBy('nomeAluno');
        
        return view('frequencia.store', compact('user', 'aula', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frequencias = $request->except('_token');

        $data = Frequencias::store($frequencias);

        $aula = Aulas::find($frequencias['idAula']);
        $id = $aula['idSemestreDisciplina'];

        return redirect()->action('SemestreDisciplinasController@show', $id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frequencias  $frequencias
     * @return \Illuminate\Http\Response
     */
    public function show(Frequencias $frequencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frequencias  $frequencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Frequencias $frequencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frequencias  $frequencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $frequencias = $request->except('_token');

        $falta = $frequencias['falta'];
        $id = $frequencias['id'];
        $cont = count($id);
        
        for ($i=0; $i < $cont; $i++) { 
            $frequencia = Frequencias::find($id[$i]);
            $idSemestreDisciplina = $frequencias['idSemestreDisciplina'];
            if ($frequencia->falta != $falta[$i]) {
                $frequencia->falta = $falta[$i];
                $frequencia->save();
            }
        }

        return redirect()->route('semestreDisciplina.show', $idSemestreDisciplina);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frequencias  $frequencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frequencias $frequencias)
    {
        //
    }
}
