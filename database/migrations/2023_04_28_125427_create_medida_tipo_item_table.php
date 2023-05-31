<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedidaTipoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medida_tipo_item', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('medida_id');
            $table->foreign('medida_id')->references('id')->on('medidas')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_item_id');
            $table->foreign('tipo_item_id')->references('id')->on('tipo_items')->onDelete('cascade');
            
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
        Schema::dropIfExists('medida_tipo_item');
    }
}
