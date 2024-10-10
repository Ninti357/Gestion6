<?php

namespace Database\Seeders;

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
                'id' => 1,
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Medicamentos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Bolso Escolar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Kit quirurgico',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('beneficios')->insert($data);
    }
}
