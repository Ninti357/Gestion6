<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AsignacionBeneficioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_beneficio_id' => fake()->numberBetween(1, 9),
            'beneficio_id' => fake()->numberBetween(1, 48),
            'persona_id' => fake()->numberBetween(1, 2000),
            'cantidad' => fake()->numberBetween(1, 10),
            'observaciones' => fake()->text(),
        ];
    }
}
