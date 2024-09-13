<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComunidadesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeders/csvs/comunidades.csv';
        $this->tablename = 'comunidades';
        // $this->timestamps = now();
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
