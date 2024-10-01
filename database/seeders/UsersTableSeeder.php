<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user1 = User::create([
            'name' => 'Administador',
            'email' => 'admin@email.com',
            'cedula' => '1234567890',
            'primer_nombre' => 'Admin',
            'segundo_nombre' => 'Admin',
            'primer_apellido' => 'Admin',
            'segundo_apellido' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $user2 = User::create([
            'name' => 'Test Demo',
            'email' => 'test@email.com',
            'cedula' => '1234567890',
            'primer_nombre' => 'Test',
            'segundo_nombre' => 'Test',
            'primer_apellido' => 'Test',
            'segundo_apellido' => 'Test',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $user1->assignRole(1);
        // $user2->assignRole(2);


    }
}
