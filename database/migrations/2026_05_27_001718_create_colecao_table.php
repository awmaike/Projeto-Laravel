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
        Schema::create('colecao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('figura_id');
            $table->unsignedBigInteger('usuario_id');
            $table->enum('disponivel' ,['Sim' , 'Não'])->default('Sim');
            $table->integer('quantidade');
            $table->float('valor');
            $table->timestamps();
            $table->foreign('figura_id')->references('id')->on('figuras')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colecao');
    }
};
