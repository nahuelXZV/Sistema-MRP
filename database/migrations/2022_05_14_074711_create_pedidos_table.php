<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('distribuidor_id')->nullable();
            $table->unsignedBigInteger('pedido_cancelado_id')->nullable();
            $table->text('descripcion');
            $table->text('direccion');
            $table->string('estado');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('distribuidor_id')->references('id')->on('distribuidors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pedido_cancelado_id')->references('id')->on('pedido_cancelados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
