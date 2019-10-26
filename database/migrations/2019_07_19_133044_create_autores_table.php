<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('pais');
            $table->string('descricao', 150);
            $table->integer('anonascimento')->length(4);
            $table->integer('anomorte')->length(4)->nullable();
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->string('user_id');
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
        Schema::dropIfExists('autores');
    }
}
