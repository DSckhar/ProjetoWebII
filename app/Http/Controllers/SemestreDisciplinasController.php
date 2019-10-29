<?php

namespace App\Http\Controllers;

use App\Models\Semestres;
use App\Models\SemestreDisciplinas;
use App\Models\Disciplinas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SemestreDisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $disciplinas = Disciplinas::listar()->sortBy('nome');
        $semestreAtual = Semestres::all()->sortByDesc('created_at')->first();

        $semestreDisciplinas = SemestreDisciplinas::listar()->where('idSemestre', '=', $semestreAtual['id']);
        $historicos = SemestreDisciplinas::listar()->where('idSemestre', '!=', $semestreAtual['id']);

        return view('semestreDisciplina.index', compact('semestreDisciplinas','semestreAtual', 'disciplinas', 'historicos', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semestreDisciplina = $request->except('_token');
        $semestreDisciplinas = SemestreDisciplinas::all()
            ->where('idDisciplina', '=', $semestreDisciplina['idDisciplina'])
            ->where('idSemestre', '=', $semestreDisciplina['idSemestre']);

        if (count($semestreDisciplinas) > 0) {
            return back()->with('mensagem', 'A disciplina selecionada já está sendo ofertada no semestre atual!');
        }else{
            $semestreDisciplina = SemestreDisciplinas::store($semestreDisciplina);
            return redirect()->action('SemestreDisciplinasController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SemestreDisciplinas  $semestreDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function show(SemestreDisciplinas $semestreDisciplinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SemestreDisciplinas  $semestreDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function edit(SemestreDisciplinas $semestreDisciplinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SemestreDisciplinas  $semestreDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SemestreDisciplinas $semestreDisciplinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SemestreDisciplinas  $semestreDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SemestreDisciplinas $semestreDisciplinas)
    {
        //
    }
}
