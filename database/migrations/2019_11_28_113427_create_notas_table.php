<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor', 4,2);
            $table->string('referencia');
            $table->unsignedBigInteger('idMatriculaDisciplina');
            $table->foreign('idMatriculaDisciplina')->references('id')->on('matricula_disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('notas');
    }
}
