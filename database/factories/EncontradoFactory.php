<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class EncontradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'caracteristicas'=> $this->faker->word(),
           'saude'=> $this->faker->word(),
           'telefone'=> $this->faker->phoneNumber(),
        ];
    }
}
