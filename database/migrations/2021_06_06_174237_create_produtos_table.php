<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id_p');
            $table->char('nome_produto')->unique();
            $table->longText('descricao')->nullable();
            $table->string('breve_descricao')->nullable();
            $table->string('tipo_produto')->nullable();
            //$table->string('tipo_produto')->unsigned();
            //$table->foreign('tipo_produto')->references('id_tp')->on('tipo_produtos')->onDelete('cascade');
            $table->string('ref')->nullable();
            $table->string('atributos')->nullable();
            $table->boolean('atributos_visivel')->nullable();
            $table->string('variação')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            //$table->('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
