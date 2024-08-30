<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perdido;

class PerdidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('perdidos')->insert([
            [
                'id' => 1,
                'nome' => 'Bob Reinould',
                'idade' => '8 anos',
                'especie' => 'Cachorro',
                'raca' => 'Vira-Lata Caramelo',
                'caracteristicas' => 'Cachorro vira-lata de cor caramelo, bem gordinho',
                'porte' => 'Médio',
                'data' => '2024-08-11',
                'local' => 'Desapareceu próximo ao Celeiro Center',
                'responsavel' => 'Arlindo Cruz',
                'telefone' => '+55 49 99999-9999',
                'recompensa' => 'R$ 100,00',
                'created_at' => '2024-08-24 18:26:07',
                'updated_at' => '2024-08-24 18:29:38',
                'categoria_id' => 2,
            ],
            [
                'id' => 2,
                'nome' => 'Joaquina',
                'idade' => '3 anos',
                'especie' => 'Gata',
                'raca' => 'Sem Raça',
                'caracteristicas' => 'Ela é Laranja',
                'porte' => 'Normal',
                'data' => '2024-08-06',
                'local' => 'Desapareceu próximo ao Sicoob do Palmital',
                'responsavel' => 'Ana Bella',
                'telefone' => '+55 49 88888-9999',
                'recompensa' => 'R$ 200,00',
                'created_at' => '2024-08-24 18:26:07',
                'updated_at' => '2024-08-24 18:29:38',
                'categoria_id' => 1,
            ],
            [
                'id' => 3,
                'nome' => 'Jorge',
                'idade' => '1 ano',
                'especie' => 'Calopsita',
                'raca' => 'Não sei',
                'caracteristicas' => 'Amarelo e cinza, com bochechas rosadas',
                'porte' => 'Pequeno',
                'data' => '2024-08-01',
                'local' => 'Desapareceu na rua Pernambuco, próximo a escola Severiano',
                'responsavel' => 'Marcelo Rossi',
                'telefone' => '+55 49 88888-8888',
                'recompensa' => 'R$ 0,00',
                'created_at' => '2024-08-24 18:26:07',
                'updated_at' => '2024-08-24 18:29:38',
                'categoria_id' => 3,
            ],
        ]);
    }
}
