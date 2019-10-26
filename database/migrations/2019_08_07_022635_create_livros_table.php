<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn');
            $table->string('titulo');
            $table->string('subtitulo');
            $table->string('descricao', 150);
            $table->integer('anoLivro')->length(4);
            $table->integer('numPagina')->length(4);
            $table->string('edicao', 150);
            $table->bigInteger('numeroCopias')->nullable();
            $table->string('codigoLivro')->unique();
            // $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id')->references('id')->on('status');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('autores');
            $table->unsignedBigInteger('editora_id');
            $table->foreign('editora_id')->references('id')->on('editoras');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('livros');
    }
}
