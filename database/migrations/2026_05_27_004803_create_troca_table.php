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
        Schema::create('troca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('figura_id');
            $table->unsignedBigInteger('usuario_recebeu');
            $table->unsignedBigInteger('usuario_enviou');
            $table->enum('situacao', ['Pendente', 'Aceito', 'Recusado'])->default('Pendente');
            $table->timestamps();
            $table->foreign('figura_id')->references('id')->on('figuras')->onDelete('cascade');
            $table->foreign('usuario_recebeu')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_enviou')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('troca');
    }
};
