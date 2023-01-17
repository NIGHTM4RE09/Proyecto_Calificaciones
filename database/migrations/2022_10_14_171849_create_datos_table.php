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
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_nacimiento');
            $table->string('curp')->unique();
            $table->string('tipo_sangre');
            $table->text('situacion_familiar')->nullable();
            $table->text('relacion_familiar')->nullable();
            $table->text('personalidad')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('enfermedades')->nullable();
            $table->text('alergias')->nullable();
            $table->text('deficiencias')->nullable();
            $table->text('atencion')->nullable();
            $table->boolean('faltas')->nullable()->default(false);
            $table->unsignedBigInteger('alumno_id')->unique();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('datos');
    }
};
