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
    Schema::create('avaliacoes', function (Blueprint $table) {
        $table->id();
        $table->string('nome_cliente');
        $table->text('comentario')->nullable();
        $table->unsignedTinyInteger('nota'); // de 1 a 5
        $table->timestamp('data')->useCurrent(); // data da avaliação
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
