<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class PerdidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nome'=> $this->faker->word(),
           'idade'=> $this->faker->randomNumber(),
           'especie'=> $this->faker->word(),
           'raca'=> $this->faker->word(),
           'caracteristicas'=> $this->faker->word(),
           'porte'=> $this->faker->word(),
           'data'=> $this->faker->randomNumber(),
           'local'=> $this->faker->word(),
           'responsavel'=> $this->faker->word(),
           'telefone'=> $this->faker->phoneNumber(),
           'recompensa'=> $this->faker->word(),

        ];
    }
}
