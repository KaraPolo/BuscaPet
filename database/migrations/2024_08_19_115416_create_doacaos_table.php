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
    {//database/migration
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',300);
            $table->string('idade',300);
            $table->string('raca',300);
            $table->string('sexo',300);
            $table->string('caracteristicas',300);
            $table->string('historia',300);
            $table->string('saude',300);
            $table->string('observacao',300);
            $table->string('responsavel',300);
            $table->string('telefone',300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacaos');
    }
};
