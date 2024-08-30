<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
use App\Models\Dono;
use App\Models\Perdido;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atualizacao>
 */
class AtualizacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_id' => (Status::inRandomOrder()->first())->id,
            'dono_id' => (Dono::inRandomOrder()->first())->id,
            'perdido_id' => (Perdido::inRandomOrder()->first())->id,
            'data_atualizacao' => fake()->date(),
        ];
    }
}
