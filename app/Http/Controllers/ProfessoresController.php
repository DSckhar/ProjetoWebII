<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use App\Models\Semestres;
use App\Models\SemestreDisciplinas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfessoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $professores = Professores::all();
        return view('professor.index', compact('professores', 'user'));
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
        $professor = $request->except('_token');
        $professores = Professores::all()->where('email', '=', $professor['email']);

        if (count($professores) > 0) {
            return back()->with('mensagem', 'E-Mail já cadastrado para um professor!');
        }else{
            $professor = Professores::store($professor);
            return redirect()->action('ProfessoresController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        $professor = Professores::find($id);
        $semestre = Semestres::all()->last();

        $disciplinasCorrentes = SemestreDisciplinas::listar()
            ->where('idProfessor', '=', $professor['id'])
            ->where('idSemestre', '=', $semestre['id']);
        
        $lecionadas = SemestreDisciplinas::listar()
            ->where('idProfessor', '=', $professor['id'])
            ->where('idSemestre', '!=', $semestre['id']);
        
        return view('professor.show', compact('professor', 'disciplinasCorrentes', 'lecionadas', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function edit(Professores $professores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $professores = $request->except('_token');
        $professor = Professores::find($professores['id']);


        $todosProfessores = Professores::all()
            ->where('id', '!=', $professores['id'])
            ->where('email', '=', $professores['email']);

        if (count($todosProfessores) > 0) {
            return back()->with('mensagem', 'E-Mail já cadastrado para um professor!');
        }else{
            
            $professor->nome = $professores['nome'];
            $professor->email = $professores['email'];
            $professor->titulacao = $professores['titulacao'];
            $professor->salario = $professores['salario'];
            $professor->save();

            return redirect()->route('professor.show', $professor['id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professores  $professores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = Professores::find($id)->delete();

        return redirect()->action('ProfessoresController@index');
    }
}
