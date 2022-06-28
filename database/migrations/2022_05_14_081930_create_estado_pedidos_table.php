<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mps_id')->nullable();
            $table->unsignedBigInteger('detallePedido_id');
            $table->string('cantidad_total')->nullable();
            $table->string('cantidad_stock')->nullable();
            $table->string('estado')->nullable();
            $table->foreign('mps_id')->references('id')->on('mps')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('detallePedido_id')->references('id')->on('detalle_pedidos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('estado_pedidos');
    }
}
