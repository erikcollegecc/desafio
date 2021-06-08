<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePordSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pord_simples', function (Blueprint $table) {
            $table->increments('id_ps');
            $table->char('nome');
            $table->integer('id_prod')->unsigned();
            $table->foreign('id_prod')->references('id_p')->on('produtos')->onDelete('cascade');
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
        Schema::dropIfExists('pord_simples');
    }
}
