<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_semestres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('modulo');
            $table->decimal('valor', 10,2)->default(0.0)->nullable();
            $table->unsignedBigInteger('idMatricula');
            $table->foreign('idMatricula')->references('id')->on('matriculas')->onDelete('cascade');   
            $table->unsignedBigInteger('idSemestre');
            $table->foreign('idSemestre')->references('id')->on('semestres')->onDelete('cascade');   
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
        Schema::dropIfExists('matricula_semestres');
    }
}
