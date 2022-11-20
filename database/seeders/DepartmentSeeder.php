<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Teknik Elektro'
        ]);

        Department::create([
            'name' => 'Teknik Informatika dan Komputer'
        ]);

        Department::create([
            'name' => 'Teknik Mekanika Energi'
        ]);

        Department::create([
            'name' => 'Teknik Multimedia Kreatif'
        ]);
    }
}
