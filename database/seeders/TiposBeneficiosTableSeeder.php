<?php

namespace Database\Seeders;

use App\Models\TipoBeneficio;
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
            [
                'id' => 3,
                'tipo_beneficio' => 'Trasporte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'tipo_beneficio' => 'Vivienda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'tipo_beneficio' => 'Alimentacion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'tipo_beneficio' => 'Empleo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'tipo_beneficio' => 'Telecomunicacion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'tipo_beneficio' => 'Agricultura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'tipo_beneficio' => 'Seguro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
        ]; 
        
        DB::table('tipos_beneficios')->insert($data);
        
    }
}

