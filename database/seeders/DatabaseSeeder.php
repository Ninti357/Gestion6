<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pueblo;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Persona;
use Illuminate\Database\Seeder;
use App\Models\AsignacionBeneficios;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            StatusTableSeeder::class,
            UsersTableSeeder::class,
            GenerosTableSeeder::class,
            PueblosTableSeeder::class,
            VenezuelaTableSeeder::class,
            ComunidadesTableSeeder::class,
            EstadosCivilesTableSeeder::class,
            TiposBeneficiosTableSeeder::class,
            BeneficiosTableSeeder::class,
            TiposIdentificacionesTableSeeder::class,
        ]);

        Persona::factory(2000)->create();
        AsignacionBeneficios::factory(2000)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
