<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufactura_id')->nullable();
            $table->unsignedInteger('productos_terminados')->nullable();
            $table->unsignedInteger('productos_faltantes')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('tiempo')->nullable();
            $table->foreign('manufactura_id')->references('id')->on('manufacturas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('estados');
    }
}
