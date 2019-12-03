<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('media', 4,2)->default(0.0)->nullable();
            $table->string('status')->default('matriculado')->nullable();
            $table->unsignedBigInteger('idMatriculaSemestre');
            $table->foreign('idMatriculaSemestre')->references('id')->on('matricula_semestres')->onDelete('cascade'); 
            $table->unsignedBigInteger('idSemestreDisciplina');
            $table->foreign('idSemestreDisciplina')->references('id')->on('semestre_disciplinas')->onDelete('cascade'); 
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
        Schema::dropIfExists('matricula_disciplinas');
    }
}
