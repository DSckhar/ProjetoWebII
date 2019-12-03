<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alunos;
use App\Models\Matriculas;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $alunos = Alunos::all();
        return view('aluno.index', compact('alunos', 'user'));
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
    public function store(Request $request)
    {   
        $aluno = $request->except('_token');
        $alunosEmail = Alunos::all()->where('email', '=', $aluno['email']);
        $alunosNum = Alunos::all()->Where('nMatricula', '=', $aluno['nMatricula']);

        if (count($alunosEmail) > 0  && count($alunosNum) > 0) {
            return back()->with('mensagem', 'E-Mail e Número de matrícula já cadastrados para um aluno!');
        }elseif (count($alunosEmail) > 0){
            return back()->with('mensagem', 'E-Mail já cadastrado para um aluno!');
        }elseif (count($alunosNum) > 0){
            return back()->with('mensagem', 'Número de matrícula já cadastrado para um aluno!');
        }else{
            $aluno = Alunos::store($aluno);
            return redirect()->action('AlunosController@index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $aluno = Alunos::find($id);
        $matriculas = Matriculas::listar()->where('idAluno', '=', $id);
        $ativa = Matriculas::listar()->where('idAluno', '=', $id)->where('status', '=', 'ativo');
        if (count($ativa) > 0) {
            $ativa = "true";
        }else{
            $ativa = "false";
        }
        return view('aluno.show', compact('aluno', 'matriculas', 'ativa', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alunos $alunos)
    {
        $alunos = $request->except('_token');
        $aluno = Alunos::find($alunos['id']);

        $todosAlunos = Alunos::all()
            ->where('id', '!=', $alunos['id'])
            ->where('email', '=', $alunos['email']);

        if (count($todosAlunos) > 0 ) {
            return back()->with('mensagem', 'E-Mail já cadastrado para um aluno!');
        }else{
            $aluno->nome = $alunos['nome'];
            $aluno->email = $alunos['email'];
            $aluno->nascimento = $alunos['nascimento'];
            $aluno->save();

            return redirect()->route('aluno.show', $alunos['id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Alunos::find($id)->delete();

        return redirect()->action('AlunosController@index');
    }
}
