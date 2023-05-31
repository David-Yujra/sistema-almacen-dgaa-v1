<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_proveedor', function (Blueprint $table) {
            $table->id();
            
            $table->integer('cantidad_producto');
            $table->integer('cantidad_medida');
            $table->decimal('precio_unitario', 10, 2);
            $table->dateTime('fecha_hora_ingreso');
            $table->string('fecha_expiracion');

            $table->unsignedBigInteger('cotizado_por')->nullable();
            $table->foreign('cotizado_por')->references('id')->on('personals');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items');

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

            $table->unsignedBigInteger('medida_id');
            $table->foreign('medida_id')->references('id')->on('medidas');

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
        Schema::dropIfExists('item_proveedor');
    }
}
