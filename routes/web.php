<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/sair', 'HomeController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function(){
    
    //ALUNO
    Route::post('aluno/editado', 'AlunosController@update')->name('aluno.editado');
    Route::get('aluno/deletado/{id}', 'AlunosController@destroy')->name('aluno.deletado');
    Route::resource('aluno', 'AlunosController');

    //CURSO
    Route::post('curso/editado', 'CursosController@update')->name('curso.editado');
    Route::get('curso/deletado/{id}', 'CursosController@destroy')->name('curso.deletado');
    Route::resource('curso', 'CursosController');

    //PROFESSOR
    Route::post('professor/editado', 'ProfessoresController@update')->name('professor.editado');
    Route::get('professor/deletado/{id}', 'ProfessoresController@destroy')->name('professor.deletado');
    Route::resource('professor', 'ProfessoresController');

    //DISCIPLINA
    Route::post('disciplina/editado', 'DisciplinasController@update')->name('disciplina.editado');
    Route::get('disciplina/deletado/{id}', 'DisciplinasController@destroy')->name('disciplina.deletado');
    Route::resource('disciplina', 'DisciplinasController');

    //SEMESTRE
    Route::get('semestre/deletado/{id}', 'SemestresController@destroy')->name('semestre.deletado');
    Route::resource('semestre', 'SemestresController');

    //SEMESTREDISCIPLINAS
    Route::post('semestreDisciplina/cadastrado', 'SemestreDisciplinasController@store')->name('semestreDisciplina.store');
    Route::post('semestreDisciplina/editado', 'SemestreDisciplinasController@update')->name('semestreDisciplina.editado');
    Route::get('semestreDisciplina/deletado/{id}', 'SemestreDisciplinasController@destroy')->name('semestreDisciplina.deletado');
    Route::resource('semestreDisciplina', 'SemestreDisciplinasController');

    //MATRICULA
    Route::get('matricula/cadastrar/{id}', 'MatriculasController@create')->name('matricula.criar');
    Route::get('matricula/deletado/{id}', 'MatriculasController@destroy')->name('matricula.deletado');
    Route::resource('matricula', 'MatriculasController');

    //MATRICULASEMESTRES
    Route::get('matriculaSemestre/cadastrar/{id}', 'MatriculaSemestresController@store')->name('matriculaSemestre.criar');
    Route::get('matriculaSemestre/deletado/{id}', 'MatriculaSemestresController@destroy')->name('matriculaSemestre.deletado');
    Route::resource('matriculaSemestre', 'MatriculaSemestresController');

});
