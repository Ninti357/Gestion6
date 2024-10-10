<?php

namespace Database\Seeders;

use App\Models\Beneficio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BeneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Medicamentos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Bolso Escolar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Kit quirurgico',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($data as $key) {
            Beneficio::create($key);
        }
    }
}
