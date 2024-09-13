<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            ['id' => 1, 'status' => 'Activo'],
            ['id' => 2, 'status' => 'Inactivo'],
            ['id' => 3, 'status' => 'Suspendido'],
            ['id' => 4, 'status' => 'Aprobado'],
            ['id' => 5, 'status' => 'Pendiente'],
        ]);
    }
}
