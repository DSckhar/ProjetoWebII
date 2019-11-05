<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Semestres;
use Illuminate\Http\Request;

class SemestresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $semestres = Semestres::all()->sortByDesc('created_at');
        return view('semestre.index', compact('semestres', 'user'));
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
        $semestre = $request->except('_token');
        $semestres = Semestres::all()->where('descricao', '=', $semestre['descricao']);
        $ultimo = Semestres::all()->last();

        if ($ultimo['descricao'] <= $semestre['descricao']) {    
            if (count($semestres) > 0){
                return back()->with('mensagem', 'Semestres já cadastrado!');
            }else{
                $semestre = Semestres::store($semestre);
                return redirect()->action('SemestresController@index');
            }
        }else {
            return back()->with('mensagem', 'O novo semestre tem de ser maior que os cadastrados!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semestres  $semestres
     * @return \Illuminate\Http\Response
     */
    public function show(Semestres $semestres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semestres  $semestres
     * @return \Illuminate\Http\Response
     */
    public function edit(Semestres $semestres)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semestres  $semestres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestres $semestres)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semestres  $semestres
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $semestre = Semestres::find($id)->delete();

        return redirect()->action('SemestresController@index');
    }
}
