<?php

namespace Database\Seeders;

use App\Models\Pueblo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PueblosTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pueblos = [
            ['pueblo' => 'akawaio', 'status_id' => 4],
            ['pueblo' => 'añu', 'status_id' => 4],
            ['pueblo' => 'arawako', 'status_id' => 4],
            ['pueblo' => 'amorua', 'status_id' => 4],
            ['pueblo' => 'ayaman', 'status_id' => 4],
            ['pueblo' => 'baniva', 'status_id' => 4],
            ['pueblo' => 'baré', 'status_id' => 4],
            ['pueblo' => 'barí', 'status_id' => 4],
            ['pueblo' => 'camentsa', 'status_id' => 4],
            ['pueblo' => 'cases', 'status_id' => 4],
            ['pueblo' => 'cubeo', 'status_id' => 4],
            ['pueblo' => 'cumanagoto', 'status_id' => 4],
            ['pueblo' => 'chaima', 'status_id' => 4],
            ['pueblo' => 'eñepa', 'status_id' => 4],
            ['pueblo' => 'gayón', 'status_id' => 4],
            ['pueblo' => 'guanono', 'status_id' => 4],
            ['pueblo' => 'guaiqueri', 'status_id' => 4],
            ['pueblo' => 'guazabara', 'status_id' => 4],
            ['pueblo' => 'inga', 'status_id' => 4],
            ['pueblo' => 'japreria', 'status_id' => 4],
            ['pueblo' => 'jirajara', 'status_id' => 4],
            ['pueblo' => 'jivi', 'status_id' => 4],
            ['pueblo' => 'hoti', 'status_id' => 4],
            ['pueblo' => 'caquetio', 'status_id' => 4],
            ['pueblo' => 'kariña', 'status_id' => 4],
            ['pueblo' => 'cuiba o cuiva', 'status_id' => 4],
            ['pueblo' => 'kurripako', 'status_id' => 4],
            ['pueblo' => 'mako', 'status_id' => 4],
            ['pueblo' => 'makuxi', 'status_id' => 4],
            ['pueblo' => 'mapoyo', 'status_id' => 4],
            ['pueblo' => 'mucumbu', 'status_id' => 4],
            ['pueblo' => 'ñengatú', 'status_id' => 4],
            ['pueblo' => 'orcaz', 'status_id' => 4],
            ['pueblo' => 'patamona', 'status_id' => 4],
            ['pueblo' => 'pemon', 'status_id' => 4],
            ['pueblo' => 'piapoko', 'status_id' => 4],
            ['pueblo' => 'puinave', 'status_id' => 4],
            ['pueblo' => 'quinanote', 'status_id' => 4],
            ['pueblo' => 'quinaroe', 'status_id' => 4],
            ['pueblo' => 'sáliba', 'status_id' => 4],
            ['pueblo' => 'sanema', 'status_id' => 4],
            ['pueblo' => 'sapé', 'status_id' => 4],
            ['pueblo' => 'shiriani', 'status_id' => 4],
            ['pueblo' => 'timote', 'status_id' => 4],
            ['pueblo' => 'uruak', 'status_id' => 4],
            ['pueblo' => 'waiwai', 'status_id' => 4],
            ['pueblo' => 'warao', 'status_id' => 4],
            ['pueblo' => 'warekena', 'status_id' => 4],
            ['pueblo' => 'wapishana', 'status_id' => 4],
            ['pueblo' => 'wayuu', 'status_id' => 4],
            ['pueblo' => 'wotjuja', 'status_id' => 4],
            ['pueblo' => 'yawarana', 'status_id' => 4],
            ['pueblo' => 'yacambú', 'status_id' => 4],
            ['pueblo' => 'yanomami', 'status_id' => 4],
            ['pueblo' => 'yaruro', 'status_id' => 4],
            ['pueblo' => 'yekuana', 'status_id' => 4],
            ['pueblo' => 'yukpa', 'status_id' => 4],
            ['pueblo' => 'pumé', 'status_id' => 5],
        ];

        foreach ($pueblos as $pueblo) {
            $pueblo['pueblo'] = ucfirst($pueblo['pueblo']);
            Pueblo::create($pueblo);
        }
    }
}
