<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_instructor_curso')->unsigned()->index();
            $table->string('asistencia', 20);
            $table->string('tareas', 20);
            $table->string('pts_extra', 20);
            $table->string('pts_final', 20);
            $table->string('status', 20);
            $table->foreign('id_instructor_curso')->references('id')->on('instructor_curso');
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
        Schema::dropIfExists('Evaluaciones');
    }
}
