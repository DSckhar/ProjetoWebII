<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\SemestreDisciplinas;
use App\Models\MatriculaDisciplinas;
use App\Models\Disciplinas;
use App\Models\Semestres;
use App\Models\Alunos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotasController extends Controller
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

        $alunos = SemestreDisciplinas::listarAlunos($id)->sortBy('nomeAluno');

        $avaliacao1 = Notas::all()->where('idSemestreDisciplina', '=', $id)
                                    ->where('referencia', '=' , 'Avaliação 1');
        $avaliacao2 = Notas::all()->where('idSemestreDisciplina', '=', $id)
                                    ->where('referencia', '=' , 'Avaliação 2');
        $avaliacao3 = Notas::all()->where('idSemestreDisciplina', '=', $id)
                                    ->where('referencia', '=' , 'Avaliação 3');

        if (count($avaliacao1) == 0) {
            $referencia = "Avaliação 1";
        }elseif (count($avaliacao2) == 0) {
            $referencia = "Avaliação 2";
        }elseif (count($avaliacao3) == 0) {
            $referencia = "Avaliação 3";
        }else{
            return back()->with('mensagem3', 'Já foram lançadas 3 avaliações para está disciplina!');
        }

        return view('nota.store', compact('user', 'semestreDisciplina', 'alunos', 'referencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notas = $request->except('_token');
        
        $data = Notas::store($notas);

        $idSemestreDisciplina = $notas['idSemestreDisciplina'];

        return redirect()->action('SemestreDisciplinasController@show', $idSemestreDisciplina);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show(Notas $notas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit(Notas $notas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $notas = $request->except('_token');

        $valor = $notas['valor'];
        $id = $notas['id'];
        $cont = count($id);
        
        for ($i=0; $i < $cont; $i++) { 
            $nota = Notas::find($id[$i]);
            $idSemestreDisciplina = $nota['idSemestreDisciplina'];
            if ($nota->valor != $valor[$i]) {
                $nota->valor = $valor[$i];
                $nota->save();
            }
        }

        return redirect()->route('semestreDisciplina.show', $idSemestreDisciplina);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notas $notas)
    {
        //
    }
}
