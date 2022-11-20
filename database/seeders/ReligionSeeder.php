<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'name' => 'Islam'
        ]);

        Religion::create([
            'name' => 'Kristen'
        ]);

        Religion::create([
            'name' => 'Catholic'
        ]);

        Religion::create([
            'name' => 'Hindu'
        ]);

        Religion::create([
            'name' => 'Budha'
        ]);

        Religion::create([
            'name' => 'Konghucu'
        ]);
    }
}
