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
        Schema::disableForeignKeyConstraints();

        Schema::create('atualizacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')
                    ->constrained('statuss');
            $table->foreignId('dono_id')
                    ->constrained('donos');
            $table->foreignId('perdido_id')
                    ->constrained('perdidos');
            $table->date('data_atualizacao');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atualizacaos');
    }
};
