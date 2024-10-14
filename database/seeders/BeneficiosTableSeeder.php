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
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Kit quirurgico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Vacuna',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Obtetras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Consulta optica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Ginecologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Pediatria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Nutriologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Urologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Odontologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Psicologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Cardiologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Nuerologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Ortesis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 1,
                'beneficio' => 'Protesis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Bolso Escolar',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Utiles escolares',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Beca escolar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Recurso tecnologico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 2,
                'beneficio' => 'Consejeria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 3,
                'beneficio' => 'Pasaje',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 3,
                'beneficio' => 'Subsidios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 3,
                'beneficio' => 'Mantenimiento automotriz',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 3,
                'beneficio' => 'Asignacion de vehiculo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 3,
                'beneficio' => 'Viaticos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 4,
                'beneficio' => 'Hospedaje',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 4,
                'beneficio' => 'Mobilarios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 4,
                'beneficio' => 'Remodelacion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 4,
                'beneficio' => 'Servicios publicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 4,
                'beneficio' => 'Mobilarios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 5,
                'beneficio' => 'Bolsa de alimentos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 5,
                'beneficio' => 'Jornada alimenticia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 5,
                'beneficio' => 'Combo proteico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 5,
                'beneficio' => 'Hortalizas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 6,
                'beneficio' => 'Jubilacion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 6,
                'beneficio' => 'Vacaciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 6,
                'beneficio' => 'Bonificacion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 7,
                'beneficio' => 'Internet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 7,
                'beneficio' => 'Soporte tecnico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 7,
                'beneficio' => 'Capacitacion tecnologica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 7,
                'beneficio' => 'Asignacion de equipos tecnologicos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 8,
                'beneficio' => 'Subsidios agricolas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 8,
                'beneficio' => 'Creditos agricolas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 8,
                'beneficio' => 'Incentivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 9,
                'beneficio' => 'Medico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 9,
                'beneficio' => 'Funerario',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 9,
                'beneficio' => 'Vehicular',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 9,
                'beneficio' => 'Contra robo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_beneficio_id' => 9,
                'beneficio' => 'Vivienda',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];

        DB::table('beneficios')->insert($data);
    }
}
