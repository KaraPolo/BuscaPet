<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Encontrado;

class EncontradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('encontrados')->insert([
            [
                'caracteristicas' => 'Cachorro vira-lata macho, de cores preta e branca',
                'saude' => 'Bom estado',
                'telefone' => '+55 49 91111-1111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'caracteristicas' => 'Gato macho, de cor preta',
                'saude' => 'Bom estado, mas parece estar com a pata machucada',
                'telefone' => '+55 49 92222-1111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}