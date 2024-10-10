<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TiposBeneficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'tipo_beneficio' => 'Salud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'tipo_beneficio' => 'Educación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tipos_beneficios')->insert($data);
    }
}
