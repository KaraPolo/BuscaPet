<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
use App\Models\Professor;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dono>
 */
class DonoFactory extends Factory
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
            'status_id'=>(Status::inRandomOrder()->first())->id,
        ];
    }
}
