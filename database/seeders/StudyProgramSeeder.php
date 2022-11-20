<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyProgram;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studyPrograms = [
            [
                'department_id'     => 1,
                'education_program' => 'D3',
                'major'             => 'Teknik Elektronika'
            ], [
                'department_id'     => 1,
                'education_program' => 'D4',
                'major'             => 'Teknik Elektronika'
            ], [
                'department_id'     => 1,
                'education_program' => 'D3',
                'major'             => 'Teknik Telekomunikasi'
            ], [
                'department_id'     => 1,
                'education_program' => 'D3',
                'major'             => 'Teknik Telekomunikasi'
            ], [
                'department_id'     => 1,
                'education_program' => 'D4',
                'major'             => 'Teknik Telekomunikasi'
            ], [
                'department_id'     => 1,
                'education_program' => 'D3',
                'major'             => 'Teknik Elektro Industri'
            ], [
                'department_id'     => 1,
                'education_program' => 'D4',
                'major'             => 'Teknik Elektro Industri'
            ], [
                'department_id'     => 1,
                'education_program' => 'S2',
                'major'             => 'Teknik Elektro Industri'
            ], [
                'department_id'     => 2,
                'education_program' => 'D3',
                'major'             => 'Teknik Informatika'
            ], [
                'department_id'     => 2,
                'education_program' => 'D4',
                'major'             => 'Teknik Informatika'
            ], [
                'department_id'     => 2,
                'education_program' => 'D4',
                'major'             => 'Teknik Komputer'
            ], [
                'department_id'     => 2,
                'education_program' => 'S2',
                'major'             => 'Teknik Informatika dan Komputer'
            ], [
                'department_id'     => 3,
                'education_program' => 'D4',
                'major'             => 'Teknik Mekatronika'
            ], [
                'department_id'     => 3,
                'education_program' => 'D4',
                'major'             => 'Teknik Sistem Pembangkit Energi'
            ], [
                'department_id'     => 4,
                'education_program' => 'D3',
                'major'             => 'Teknik Multimedia Broadcasting'
            ], [
                'department_id'     => 4,
                'education_program' => 'D4',
                'major'             => 'Teknik Game Technology'
            ],
        ];

        foreach ($studyPrograms as $studyProgram) {
            StudyProgram::create([
                'department_id'     => $studyProgram['department_id'],
                'education_program' => $studyProgram['education_program'],
                'major'             => $studyProgram['major']
            ]);
        }
    }
}
