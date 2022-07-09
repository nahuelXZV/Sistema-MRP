<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problemas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufactura_id')->nullable();
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->string('tipo_problema');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha');
            $table->string('estado')->nullable();
            $table->foreign('manufactura_id')->references('id')->on('manufacturas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('problemas');
    }
}
