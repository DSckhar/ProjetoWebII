<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestreDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestre_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idSemestre');
            $table->foreign('idSemestre')->references('id')->on('semestres')->onDelete('cascade');  
            $table->unsignedBigInteger('idDisciplina');
            $table->foreign('idDisciplina')->references('id')->on('disciplinas')->onDelete('cascade');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semestre_disciplinas');
    }
}
