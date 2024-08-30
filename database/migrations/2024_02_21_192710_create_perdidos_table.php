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
        Schema::create('perdidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('idade',16);
            $table->string('especie',50);
            $table->string('raca',50);
            $table->string('caracteristicas',200);
            $table->string('porte',10);
            $table->string('data',10);
            $table->string('local',100);
            $table->string('responsavel',50);
            $table->string('telefone',30);
            $table->string('recompensa',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perdidos');
    }
};
