<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\AcceptancePath::factory(6)->create();
        // \App\Models\Religion::factory(6)->create();
        // \App\Models\Department::factory(4)->create();
        // \App\Models\StudyProgram::factory(16)->create();
        $this->call([
            AcceptancePathSeeder::class,
            ReligionSeeder::class,
            DepartmentSeeder::class,
            StudyProgramSeeder::class
        ]);
        \App\Models\Lecturer::factory(10)->create();
        \App\Models\Student::factory(50)->create();
        \App\Models\Lab::factory(10)->create();
        \App\Models\FinalProject::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Gafriel Alfarizhi',
            'email' => 'gafriel@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
