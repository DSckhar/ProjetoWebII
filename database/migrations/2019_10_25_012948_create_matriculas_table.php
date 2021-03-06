<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idAluno');
            $table->foreign('idAluno')->references('id')->on('alunos')->onDelete('cascade');   
            $table->unsignedBigInteger('idCurso');
            $table->foreign('idCurso')->references('id')->on('cursos')->onDelete('cascade');
            $table->decimal('valor', 8, 2)->default(0.0);   
            $table->String('status', 12)->default('ativo');
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
        Schema::dropIfExists('matriculas');
    }
}
