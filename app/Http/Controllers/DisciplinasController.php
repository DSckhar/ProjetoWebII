<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Disciplinas;
use App\Models\SemestreDisciplinas;
use App\Models\Cursos;
use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $cursos = Cursos::all();
        $disciplinas = Disciplinas::listar();

        return view('disciplina.index', compact('cursos', 'disciplinas', 'user'));
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
        $disciplina = $request->except('_token');
        $disciplinas = Disciplinas::all()
            ->where('nome', '=', $disciplina['nome'])
            ->where('idCurso', '=', $disciplina['idCurso']);
        $curso = Cursos::find($disciplina['idCurso']);

        if (count($disciplinas) > 0) {
            return back()->with('mensagem', 'O curso selecionado já possui uma disciplina com este nome!');
        }elseif($disciplina['modulo'] > $curso['duracao']){
            return back()->with('mensagem', 'A quantidade de módulos do curso selecionado é menor do que o módulo informado!');
        }else{
            $disciplina = Disciplinas::store($disciplina);
            return redirect()->action('DisciplinasController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $disciplina = Disciplinas::find($id);
        $curso = Cursos::find($disciplina['idCurso']);
        $disciplina['nomeCurso'] = $curso['nome'];
        $cursos = Cursos::all();
        $semestreDisciplinas = SemestreDisciplinas::listar()->where('idDisciplina', '=', $id);
        
        return view('disciplina.show', compact('disciplina', 'cursos', 'semestreDisciplinas', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplinas $disciplinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $disciplinas = $request->except('_token');
        $disciplina = Disciplinas::find($disciplinas['id']);

        $todasDisciplinas = Disciplinas::all()
            ->where('id', '!=', $disciplina['id'])
            ->where('nome', '=', $disciplina['nome'])
            ->where('idCurso', '=', $disciplina['idCurso']);

        $curso = Cursos::find($disciplinas['idCurso']);

        if (count($todasDisciplinas) > 0) {
            return back()->with('mensagem', 'O curso selecionado já possui uma disciplina com este nome!');
        }elseif($disciplinas['modulo'] > $curso['duracao']){
            return back()->with('mensagem', 'A quantidade de módulos do curso selecionado é menor do que o módulo informado!');
        }else{
            $disciplina->nome = $disciplinas['nome'];
            $disciplina->valor = $disciplinas['valor'];
            $disciplina->modulo = $disciplinas['modulo'];
            $disciplina->idCurso = $disciplinas['idCurso'];
            $disciplina->save();
            return redirect()->route('disciplina.show', $disciplinas['id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplinas  $disciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplina = Disciplinas::find($id)->delete();

        return redirect()->action('DisciplinasController@index');
    }
}
