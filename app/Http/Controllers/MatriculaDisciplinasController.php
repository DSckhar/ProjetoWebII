<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MatriculaDisciplinas;
use App\Models\MatriculaSemestres;
use App\Models\Matriculas;
use App\Models\Semestres;
use App\Models\SemestreDisciplinas;
use App\Models\Alunos;
use App\Models\Cursos;
use Illuminate\Http\Request;

class MatriculaDisciplinasController extends Controller
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

        $matriculaSemestre = MatriculaSemestres::find($id);

        $matricula = Matriculas::find($matriculaSemestre['idMatricula']);
        $aluno = Alunos::find($matricula['idAluno']);
        $matriculaSemestre['nomeAluno'] = $aluno['nome'];

        $curso = Cursos::find($matricula['idCurso']);
        $matriculaSemestre['nomeCurso'] = $curso['nome'];

        $semestre = Semestres::find($matriculaSemestre['idSemestre']);
        $matriculaSemestre['descricaoSemestre'] = $semestre['descricao'];

        $semestreDisciplinas = SemestreDisciplinas::listarEspec($curso['id'], $matriculaSemestre['modulo'], $matriculaSemestre['idSemestre']);
        $matriculaDisciplinas = MatriculaDisciplinas::listarAp($matriculaSemestre['id']);
        //dd($semestreDisciplinas, $matriculaDisciplinas);
        $count = count($matriculaDisciplinas);
        if ($count > 0) {
            foreach ($semestreDisciplinas as $semestreDisciplina) {
                $semestreDisciplina->validade = "valido";
                foreach ($matriculaDisciplinas as $matriculaDisciplina) {
                    if ($matriculaDisciplina->idSemestreDisciplina == $semestreDisciplina->id) {
                        $semestreDisciplina->validade = "invalido";
                    }
                }
            }
        }
        //dd($semestreDisciplinas, $matriculaDisciplinas);
        return view('matriculaDisciplina.store', compact('user', 'matriculaSemestre', 'semestreDisciplinas', 'count'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matriculaDisciplinas = $request->except('_token');
        if (array_key_exists( 'check_list', $matriculaDisciplinas) == false) {
            return back()->with('mensagem', 'Nenhuma disciplina selecionada!');
        }else{
            $idMatriculaSemestre = $matriculaDisciplinas['idMatriculaSemestre'];
            
            $matriculaDisciplina = MatriculaDisciplinas::store($matriculaDisciplinas);

            return redirect()->action('MatriculaSemestresController@show', $idMatriculaSemestre);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatriculaDisciplinas  $matriculaDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function show(MatriculaDisciplinas $matriculaDisciplinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatriculaDisciplinas  $matriculaDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function edit(MatriculaDisciplinas $matriculaDisciplinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatriculaDisciplinas  $matriculaDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatriculaDisciplinas $matriculaDisciplinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatriculaDisciplinas  $matriculaDisciplinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatriculaDisciplinas $matriculaDisciplinas)
    {
        //
    }
}
