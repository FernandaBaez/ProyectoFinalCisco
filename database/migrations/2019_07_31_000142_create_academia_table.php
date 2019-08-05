<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->string('direccion', 100);
            $table->string('direccion2', 100);
            $table->string('pais', 100);
            $table->string('estado', 100);
            $table->string('ciudad', 100);
            $table->string('cp', 100);
            $table->string('sitio', 100);
            $table->string('tipo', 100);
            $table->bigInteger('id_contacto')->unsigned()->index();
            $table->foreign('id_contacto')->references('id')->on('contacto');
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
        Schema::dropIfExists('academia');
    }
}
