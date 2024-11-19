<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_identificacion_id' => 1,
            'cedula' => fake()->unique()->numberBetween(10000000, 40000000),
            'primer_nombre' => fake()->name(),
            'segundo_nombre' => fake()->name(),
            'primer_apellido' => fake()->name(),
            'segundo_apellido' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->phoneNumber(),
            'celular' => fake()->phoneNumber(),
            'genero_id' => fake()->numberBetween(1, 4),
            'fecha_nacimiento' => fake()->date(),
            'pueblo_id' => fake()->numberBetween(1, 58),
            'estado_civil_id' => fake()->numberBetween(1,4),
            'estado_id' => 1,
            'municipio_id' => 1,
            'parroquia_id' => 1,
            'comunidad_id' => 1,
        ];
    }
}
