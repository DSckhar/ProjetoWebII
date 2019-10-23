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

Route::group(['middleware' => 'auth'], function(){
    
    //ALUNO
    Route::resource('/aluno', 'AlunosController');

    //CURSO
    Route::resource('/curso', 'CursosController');

    //PROFESSOR
    Route::resource('/professor', 'ProfessoresController');

    //DISCIPLINA
    Route::resource('/disciplina', 'DisciplinasController');
});