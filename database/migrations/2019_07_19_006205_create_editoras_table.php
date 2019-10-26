<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('cep');
            $table->string('telefone');
            $table->string('user_id');
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
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
        Schema::dropIfExists('editoras');
    }
}
