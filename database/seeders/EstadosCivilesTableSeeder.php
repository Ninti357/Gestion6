<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
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
                'id' => 1,
                'estado_civil' => 'Soltero(a)',
            ],
            [
                'id' => 2,
                'estado_civil' => 'Casado(a)',
            ],
            [
                'id' => 3,
                'estado_civil' => 'Divorciado(a)',
            ],
            [
                'id' => 4,
                'estado_civil' => 'Viudo(a)',
            ],

        ];

        DB::table('estados_civiles')->insert($data);
    }
}
