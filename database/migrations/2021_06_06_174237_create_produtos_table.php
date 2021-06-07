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
            $table->bigIncrements('id_produto');
            $table->char('nome_produto')->unique();;
            $table->longText('descricao');
            $table->string('breve_descricao');
            $table->string('tipo_produto');
            //$table->decimal('max_price');
            //$table->decimal('min_price');
            $table->string('ref');
            //$table->('data_publicacao');
            //$table->('data_update');
            $table->string('atributos');
            $table->boolean('atributos_visivel');
            $table->string('image');
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
