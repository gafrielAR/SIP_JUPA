<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AcceptancePath;

class AcceptancePathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcceptancePath::create([
            'name' => 'SNMPTN'
        ]);

        AcceptancePath::create([
            'name' => 'SNMPN'
        ]);

        AcceptancePath::create([
            'name' => 'SBMPTN'
        ]);

        AcceptancePath::create([
            'name' => 'SBMPN'
        ]);

        AcceptancePath::create([
            'name' => 'SIMANDIRI'
        ]);

        AcceptancePath::create([
            'name' => 'Pascasarjana'
        ]);
    }
}
