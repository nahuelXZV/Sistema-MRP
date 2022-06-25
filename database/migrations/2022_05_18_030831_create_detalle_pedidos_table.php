<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('estado_pedido_id')->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estado_pedido_id')->references('id')->on('estado_pedidos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('detalle_pedidos');
    }
}
