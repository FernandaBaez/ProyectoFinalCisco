<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grupo_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_grupo')->unsigned()->index();
            $table->bigInteger('id_curso')->unsigned()->index();
            $table->integer('inscritos');
            $table->integer('aprobados');
            $table->integer('no_aprobados');
            $table->foreign('id_grupo')->references('id')->on('Grupos');
            $table->foreign('id_curso')->references('id')->on('Cursos');
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
        Schema::dropIfExists('Grupo_curso');
    }
}
