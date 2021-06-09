<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdDigitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_digitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_digi');
            $table->integer('id_simples')->unsigned();
            $table->foreign('id_simples')->references('id')->on('pord_simples')->onDelete('cascade');
            $table->string('prod_dital');
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
        Schema::dropIfExists('prod_digitals');
    }
}
