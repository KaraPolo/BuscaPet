<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doacao;

class DoacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('doacaos')->insert([
            [
                'nome' => 'Pintadinho',
                'idade' => '1 anos',
                'raca' => 'Vira-Lata',
                'sexo' => 'Macho',
                'caracteristicas' => 'Cachorro branco, com manchas pretas',
                'historia' => 'Foi abandonado em uma rua, resgatei mas não posso ficar',
                'saude' => 'Ótima, já foi vacinado',
                'observacao' => 'Ele é super dócil e carente',
                'responsavel' => 'Arthur Lima',
                'telefone' => '+55 49 94444-3333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Baleia',
                'idade' => '5 anos',
                'raca' => 'Vira-Lata',
                'sexo' => 'Fêmea',
                'caracteristicas' => 'Cachorro caramelo, bem magrinha',
                'historia' => 'Foi resgatada de uma casa onde sofria maus tratos',
                'saude' => 'Frágil, vacinada mas precisa de cuidados',
                'observacao' => 'Ele é super dócil, mas tem muito medo',
                'responsavel' => 'Instituto Ajuda',
                'telefone' => '+55 49 94444-2222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}    