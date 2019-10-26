<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_aluno');
            $table->string('sobrenome_aluno');
            $table->string('telefone_aluno');
            $table->string('email_aluno')->unique();  
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');          
            $table->rememberToken();
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
        Schema::dropIfExists('alunos');
    }
}
