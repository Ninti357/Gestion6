<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadosCivilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'estado_civil' => 'Soltero(a)',
            ],
            [
                'estado_civil' => 'Casado(a)',
            ],
            [
                'estado_civil' => 'Divorciado(a)',
            ],
            [
                'estado_civil' => 'Viudo(a)',
            ],

        ];

        DB::table('estados_civiles')->insert($data);
    }
}
