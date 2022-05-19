<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('color');
            $table->string('tamaño');
            $table->string('estado');
            $table->string('peso');
            $table->text('especificacion')->nullable();
            $table->string('costo_produccion');
            $table->string('cantidad');
            $table->unsignedBigInteger('categoria_producto')->nullable();
            $table->foreign('categoria_producto')->references('id')->on('categoria_productos');
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
        Schema::dropIfExists('productos');
    }
}
