<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdAgrupadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_agrupados', function (Blueprint $table) {
            $table->increments('id_pa');
            $table->string('name_agru');
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('id_p')->on('produtos')->onDelete('cascade');
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
        Schema::dropIfExists('prod_agrupados');
    }
}
