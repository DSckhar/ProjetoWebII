<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cursos;
use App\Models\Disciplinas;
use Illuminate\Http\Request;

class CursosController extends Controller
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
        return view('curso.index', compact('cursos', 'user'));
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
        $curso = $request->except('_token');
        $cursos = Cursos::all()->where('nome', '=', $curso['nome']);

        if (count($cursos) > 0) {
            return back()->with('mensagem', 'Curso já cadastrado no sistema!');
        }else{
            $curso = Cursos::store($curso);
            return redirect()->action('CursosController@index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $curso = Cursos::find($id);
        $disciplinas = Disciplinas::all()->where('idCurso', '=', $id);

        return view('curso.show', compact('curso', 'disciplinas', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $cursos = $request->except('_token');
        $curso = Cursos::find($cursos['id']);

        $todosCursos = Cursos::all()
            ->where('id', '!=', $cursos['id'])
            ->where('nome', '=', $cursos['nome']);

        if (count($todosCursos) > 0) {
            return back()->with('mensagem', 'Já existe outro curso cadastrado com esse nome!');
        }else{
            $curso->nome = $cursos['nome'];
            $curso->valor = $cursos['valor'];
            $curso->duracao = $cursos['duracao'];
            $curso->save();
            return redirect()->action('CursosController@show', [$cursos['id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Cursos::find($id)->delete();

        return redirect()->action('CursosController@index');
    }
}
