<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_instructor')->unsigned()->index();
            $table->bigInteger('id_curso')->unsigned()->index();
            $table->string('requiere_orientacion', 20);
            $table->string('fecha_s', 20);
            $table->string('horario', 20);
            $table->string('fecha_p', 20);
            $table->foreign('id_instructor')->references('id')->on('instructor');
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
        Schema::dropIfExists('instructor_curso');
    }
}
