<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');

            $table->string("telefone")->nullable();
            $table->string("cidade", 30)->nullable();
            $table->string("estado", 30)->nullable();
            $table->string("cep");
            $table->integer("cliente_id")->unsigned();

            $table->timestamps();

            $table->foreign("cliente_id")
            ->references("id")->on("cliente")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
