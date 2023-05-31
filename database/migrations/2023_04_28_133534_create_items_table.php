<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            //$table->string('tiempo_uso', 100);
            $table->string('descripcion')->nullable();
            $table->integer('estado')->default(1);

            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');            

            $table->unsignedBigInteger('tipo_item_id');
            $table->foreign('tipo_item_id')->references('id')->on('tipo_items')->onDelete('cascade');

            $table->unsignedBigInteger('contenido_id');
            $table->foreign('contenido_id')->references('id')->on('contenidos')->onDelete('cascade');

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
        Schema::dropIfExists('items');
    }
}
