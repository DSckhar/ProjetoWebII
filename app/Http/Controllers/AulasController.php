<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use App\Models\SemestreDisciplinas;
use App\Models\Semestres;
use App\Models\Disciplinas;
use App\Models\Frequencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AulasController extends Controller
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
    public function create($id)
    {
        $user = Auth::user();

        $semestreDisciplina = SemestreDisciplinas::find($id);
        $disciplina = Disciplinas::find($semestreDisciplina['idDisciplina']);
        $semestreDisciplina['nomeDisciplina'] = $disciplina['nome'];
        $semestre = Semestres::find($semestreDisciplina['idSemestre']);
        $semestreDisciplina['descricaoSemestre'] = $semestre['descricao'];

        $ultiAula = Aulas::all()->where('idSemestreDisciplina', '=', $id)->last();
        $minData = date('Y-m-d', strtotime('1 days', strtotime($ultiAula['data'])));
        if ($minData == null) {
            $minData = date('Y-m-d', strtotime('-6 month'));
        }

        return view('aula.store', compact('user', 'semestreDisciplina', 'minData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aula = $request->except('_token');
        $aulas = Aulas::store($aula);
        $aulas = Aulas::all()->last();
        $idAula = $aulas['id'];

        return redirect()->route('frequencia.criar', $idAula);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function show(Aulas $aulas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function edit(Aulas $aulas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aulas $aulas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aulas $aulas)
    {
        //
    }
}
