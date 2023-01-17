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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('casa_padres');
            $table->string('habitaciones');
            $table->boolean('dormitorio')->nullable()->default(false);
            $table->string('servicios');
            $table->string('suma_ingresos');
            $table->string('gastos_escolares');
            $table->boolean('vacaciones')->nullable()->default(false);
            $table->boolean('cine')->nullable()->default(false);
            $table->boolean('teatro')->nullable()->default(false);
            $table->string('actividades');
            $table->boolean('beca')->nullable()->default(false);
            $table->string('tipo_beca')->nullable();
            $table->string('recurso_beca')->nullable();
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
        Schema::dropIfExists('areas');
    }
};
