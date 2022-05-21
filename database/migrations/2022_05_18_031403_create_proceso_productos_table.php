<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proceso_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->nullable(); 
            $table->unsignedBigInteger('proceso_id')->nullable(); 
            $table->text('descripcion')->nullable();            
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('proceso_productos');
    }
}
