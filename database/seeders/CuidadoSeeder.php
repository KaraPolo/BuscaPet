<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuidado;

class CuidadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cuidados')->insert([
            [
                'titulo' => 'Como saber se ele está bem',
                'descricao' => 'Gatinhos e Doguinhos com o fucinho molhado são fortes indícios de que está bem',
                'valor' => 'Não custará nada!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Carinho no Gato',
                'descricao' => 'Gatos gostam de carinho embaixo do pescoço',
                'valor' => 'Não custará nada!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}