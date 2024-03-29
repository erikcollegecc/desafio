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
            $table->string('name');
            $table->integer('prod_simples_id')->unsigned();
            $table->foreign('prod_simples_id')->references('id')->on('prod_simples')->onDelete('cascade');
            $table->string('upload');
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
