<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_grades', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->string('calificacion');
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->unsignedBigInteger('asignatura_id')->nullable();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('table_grades');
    }
};
