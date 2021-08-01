<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_simples', function (Blueprint $table) {
            $table->increments('id');
            //$table->char('nome');
            $table->integer('produtos_id')->unsigned();
            $table->foreign('produtos_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->decimal('max_price');
            $table->decimal('min_price');
            //$table->('validade_price');
            //$table->boolean('prod_digital');
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
        Schema::dropIfExists('prod_simples');
    }
}
