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
        Schema::create('usuario__funcaos', function (Blueprint $table) {
            $table->dateTime('dataInicio');
            $table->timestamps();

            $table->unsignedBigInteger('funcao_id');
            $table->foreign('funcao_id')->references('id')->on('funcaos')->onDelete('cascade');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->primary(['funcao_id', 'usuario_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario__funcaos');
    }
};
