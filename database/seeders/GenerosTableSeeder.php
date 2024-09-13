<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = [
            [
                'id' => 1,
                "genero" => "N/A",
            ],
            [
                'id' => 2,
                "genero" => "Masculino",
            ],
            [
                'id' => 3,
                "genero" => "Femenino",
            ],
            [
                'id' => 4,
                "genero" => "Otro",
            ]
        ];

        foreach($generos as $genero) {
            Genero::firstOrNew(['id' => $genero['id']])->fill($genero)->save();
        }
    }
}
