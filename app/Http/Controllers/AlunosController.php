<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alunos;
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
    public function show(Alunos $alunos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function edit(Alunos $alunos)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alunos $alunos)
    {
        //
    }
}
