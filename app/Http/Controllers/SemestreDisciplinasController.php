<?php

namespace App\Http\Controllers;

use App\Models\Semestres;
use App\Models\SemestreDisciplinas;
use App\Models\Disciplinas;
use App\Models\Professores;
use App\Models\Frequencias;
use App\Models\Cursos;
use App\Models\Aulas;
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

        $professores = Professores::all()->sortBy('nome');
        $disciplinas = Disciplinas::listar()->sortBy('nome');
        $semestreAtual = Semestres::all()->last();

        $semestreDisciplinas = SemestreDisciplinas::listar()->where('idSemestre', '=', $semestreAtual['id']);
        $historicos = SemestreDisciplinas::listar()->where('idSemestre', '!=', $semestreAtual['id']);

        return view('semestreDisciplina.index', compact('semestreDisciplinas', 'professores', 'semestreAtual', 'disciplinas', 'historicos', 'user'));
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
    public function show($id)
    {
        $user = Auth::user();

        $semestreDisciplina = SemestreDisciplinas::find($id);
        $semestre = Semestres::find($semestreDisciplina['idSemestre']);
        $professor = Professores::find($semestreDisciplina['idProfessor']);
        $disciplina = Disciplinas::find($semestreDisciplina['idDisciplina']);
        $curso = Cursos::find($disciplina['idCurso']);
        $semestreDisciplina['descricaoSemestre'] = $semestre['descricao'];
        $semestreDisciplina['nomeProfessor'] = $professor['nome'];
        $semestreDisciplina['nomeDisciplina'] = $disciplina['nome'];
        $semestreDisciplina['nomeCurso'] = $curso['nome'];
        $aulas = Aulas::all()->where('idSemestreDisciplina', '=', $id)->sortByDesc('data');
        $alunos = SemestreDisciplinas::listarAlunos($id)->sortBy('nomeAluno');
        $notas = SemestreDisciplinas::listarNotas($id);
        $frequencias = Frequencias::listar($id)->sortBy('nomeAluno');


        foreach ($alunos as $aluno) {
            $aluno->nota1 = $aluno->nota2 = $aluno->nota3 = '--';
            foreach($notas as $nota){
                if($aluno->idMatriculaDisciplina == $nota->idMatriculaDisciplina){
                    if($nota->referencia == "Avaliação 1"){
                        $aluno->nota1 = $nota->nota;
                    }
                    if($nota->referencia == "Avaliação 2"){
                        $aluno->nota2 = $nota->nota;
                    }
                    if($nota->referencia == "Avaliação 3"){
                        $aluno->nota3 = $nota->nota;
                    }
                }
            }
        }
            
        return view('semestreDisciplina.show', compact('user', 'semestreDisciplina', 'aulas', 'alunos', 'notas', 'frequencias'));
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
    public function destroy($id)
    {
        $semestreDisciplina = SemestreDisciplinas::find($id)->delete();

        return redirect()->action('SemestreDisciplinasController@index');
    }
}
