<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MatriculaSemestres;
use App\Models\Matriculas;
use App\Models\Semestres;
use App\Models\Alunos;
use App\Models\Cursos;
use Illuminate\Http\Request;

class MatriculaSemestresController extends Controller
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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $matricula = Matriculas::find($id);
        $matriculaSemestre['idMatricula'] = $id;
        $semestre = Semestres::all()->last();
        $matriculaSemestre['idSemestre'] = $semestre['id'];

        $matriculaSemestres = MatriculaSemestres::all()->where('idMatricula', '=', $id);

        $curso = Cursos::find($matricula['idCurso']);
        
        if(count($matriculaSemestres) >= $curso['duracao']){
            $matriculaSemestre['modulo'] = $curso['duracao'];
        }else{
            $matriculaSemestre['modulo'] = count($matriculaSemestres) + 1;
        }

        $ms = MatriculaSemestres::all()->where('idMatricula', '=', $id)
                                        ->where('idSemestre', '=', $semestre['id']);
                                        
        if (count($ms) == 0 ) {
            $matriculaSemestre = MatriculaSemestres::store($matriculaSemestre);            
        }

        return redirect()->route('matricula.show', $id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatriculaSemestres  $matriculaSemestres
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $matriculaSemestre = MatriculaSemestres::find($id);
        $matricula = Matriculas::find($matriculaSemestre['idMatricula']);
        $aluno = Alunos::find($matricula['idAluno']);
        $curso = Cursos::find($matricula['idCurso']);
        $semestre = Semestres::find($matriculaSemestre['idSemestre']);
        $matriculaSemestre['nomeAluno'] = $aluno['nome'];
        $matriculaSemestre['nomeCurso'] = $curso['nome'];
        $matriculaSemestre['descricaoSemestre'] = $semestre['descricao'];
        
        return view('matriculaSemestre.show', compact('user', 'matriculaSemestre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatriculaSemestres  $matriculaSemestres
     * @return \Illuminate\Http\Response
     */
    public function edit(MatriculaSemestres $matriculaSemestres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatriculaSemestres  $matriculaSemestres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatriculaSemestres $matriculaSemestres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatriculaSemestres  $matriculaSemestres
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matriculaSemestre = MatriculaSemestres::find($id);
        $idMatricula = $matriculaSemestre['idMatricula'];
        $matriculaSemestre->delete();

        return redirect()->action('MatriculasController@show', $idMatricula);
    }
}
