<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoCopia')->unique();
            $table->unsignedBigInteger('biblioteca_id');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('copias');
    }
}
