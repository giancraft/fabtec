<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('contato_id');
            $table->foreign('contato_id')->references('id')->on('contatos');
            $table->primary('contato_id');
            $table->string('endereco', 100);
            $table->string('numero', 10)->nullable();
            $table->string('cep', 10);
            $table->string('bairro', 45);
            $table->string('complemento', 100);
            $table->timestamps();
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidadesc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
