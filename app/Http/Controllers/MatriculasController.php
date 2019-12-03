<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Matriculas;
use App\Models\MatriculaSemestres;
use App\Models\Semestres;
use App\Models\Cursos;
use App\Models\Alunos;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $matriculas = Matriculas::listar();

        return view('matricula.index', compact('matriculas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user();
        
        $aluno = Alunos::find($id);
        $cursos = Cursos::all();

        return view('matricula.store', compact('cursos', 'aluno', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matricula = $request->except('_token');
        $idAluno = $matricula['idAluno'];
        $curso = Cursos::find($matricula['idCurso']);
        $matricula['valor'] = $curso['valor'];
        $matriculas = Matriculas::all()->where('idAluno', '=', $matricula['idAluno'])
            ->where('idCurso', '=', $matricula['idCurso']);

        if (count($matriculas) > 0) {
            return back()->with('mensagem', 'O aluno selecionado já está matriculado no curso escolhido!');
        }else{
            $matricula = Matriculas::store($matricula);
            return redirect()->route('aluno.show', $idAluno);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matriculas  $matriculas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $matricula = Matriculas::find($id);
        $curso = Cursos::find($matricula['idCurso']);
        $aluno = Alunos::find($matricula['idAluno']);
        $matricula['nomeAluno'] = $aluno['nome'];
        $matricula['nomeCurso'] = $curso['nome'];

        $matriculaSemestres = MatriculaSemestres::listar()->where('idAluno', '=', $matricula['idAluno']);

        $atual = Semestres::all()->last();
        $ultimaMatSemestre = MatriculaSemestres::all()->where('idMatricula', '=', $id)->last();

        if ($ultimaMatSemestre['idSemestre'] != $atual['id']) {
            $valido = 'true';
        }else {
            $valido = 'false';
        }
        
        return view('matricula.show', compact('user', 'matricula', 'matriculaSemestres', 'valido'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matriculas  $matriculas
     * @return \Illuminate\Http\Response
     */
    public function edit(Matriculas $matriculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matriculas  $matriculas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matriculas $matriculas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matriculas  $matriculas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matriculas::find($id);
        $idAluno = $matricula['idAluno'];
        $matricula->delete();

        return redirect()->action('AlunosController@show', $idAluno);
    }
}
