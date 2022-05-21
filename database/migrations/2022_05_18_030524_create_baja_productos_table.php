<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baja_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dada_baja_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->foreign('dada_baja_id')->references('id')->on('dada_bajas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('baja_productos');
    }
}
