<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoIdentificacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiposIdentificacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tipo_identificacion' => 'Cédula Venezolana',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_identificacion' => 'Cédula Extranjera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_identificacion' => 'Cédula Representante Legal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_identificacion' => 'Cédula Lider/Jefe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_identificacion' => 'Pasaporte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_identificacion' => 'Carnet Extranjeria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $key) {
            TipoIdentificacion::create($key);
        }
    }
}
