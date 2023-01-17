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
        Schema::create('habitos', function (Blueprint $table) {
            $table->id();
            $table->boolean('intereses')->nullable()->default(false);
            $table->boolean('horario')->nullable()->default(false);
            $table->string('horario_estudio')->nullable();
            $table->boolean('tareas')->nullable()->default(false);
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
        Schema::dropIfExists('habitos');
    }
};
