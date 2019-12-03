<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('falta');
            $table->unsignedBigInteger('idAula');
            $table->foreign('idAula')->references('id')->on('aulas')->onDelete('cascade');
            $table->unsignedBigInteger('idMatriculaDisciplina');
            $table->foreign('idMatriculaDisciplina')->references('id')->on('matricula_disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('frequencias');
    }
}
