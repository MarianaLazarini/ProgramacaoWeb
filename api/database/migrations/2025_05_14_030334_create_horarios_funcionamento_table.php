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
    Schema::create('horarios_funcionamento', function (Blueprint $table) {
        $table->id();
        $table->string('dia_semana');      // ex: Segunda-feira
        $table->string('abre');            // ex: 11:00
        $table->string('fecha');           // ex: 22:00
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('horarios_funcionamento');
    }
};
