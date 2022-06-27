<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPrimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->text('descripcion')->nullable();
            $table->string('tamaño');
            $table->string('peso');
            $table->string('color');
            $table->unsignedBigInteger('cantidad')->default(0);
            $table->unsignedBigInteger('idCategoriaMP')->nullable();
            $table->foreign('idCategoriaMP')->references('id')->on('categoria_materia_primas');

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
        Schema::dropIfExists('materia_primas');
    }
}
