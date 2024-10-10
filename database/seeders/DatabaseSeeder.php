<?php

namespace Database\Seeders;

use App\Models\Pueblo;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
