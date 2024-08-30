<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class DoacaoFactory extends Factory
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
           'raca'=> $this->faker->word(),
           'sexo'=> $this->faker->word(),
           'caracteristicas'=> $this->faker->word(),
           'historia'=> $this->faker->word(),
           'saude'=> $this->faker->word(),
           'observacao'=> $this->faker->word(),
           'responsavel'=> $this->faker->word(),
           'telefone'=> $this->faker->phoneNumber(),
        ];
    }
}
