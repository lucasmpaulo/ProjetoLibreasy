<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros');
            $table->unsignedBigInteger('copia_id');
            $table->foreign('copia_id')->references('id')->on('copias')->onDelete('cascade');
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->dateTime('data_locacao');
            $table->dateTime('data_devolucao')->nullable();
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
        Schema::dropIfExists('locacoes');
    }
}
