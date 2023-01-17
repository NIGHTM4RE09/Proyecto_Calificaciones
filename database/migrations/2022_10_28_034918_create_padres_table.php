<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->string('nombre')->unique();
            $table->boolean('vive')->nullable()->default(false);
            $table->string('edad')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('estudios')->nullable();
            $table->string('profesion')->nullable();
            $table->string('horario_laboral')->nullable();
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
        Schema::dropIfExists('padres');
    }
};
