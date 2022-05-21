<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable(); 
            $table->unsignedBigInteger('materia_prima_id')->nullable(); 
            $table->unsignedInteger('cantidad')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materia_prima_id')->references('id')->on('materia_primas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bon_productos');
    }
}
