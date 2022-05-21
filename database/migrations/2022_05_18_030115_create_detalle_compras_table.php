<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_compras_id')->nullable();
            $table->unsignedBigInteger('materia_primas_id')->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->double('costo')->nullable();
            $table->foreign('nota_compras_id')->references('id')->on('nota_compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('materia_primas_id')->references('id')->on('materia_primas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_compras');
    }
}
