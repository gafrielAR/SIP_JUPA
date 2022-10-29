<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FinalProject>
 */
class FinalProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'first_mentor' => $this->faker->numberBetween($min = 1, $max = 10),
            'second_mentor' => $this->faker->numberBetween($min = 1, $max = 10),
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'lab_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'proposal_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'proposal_revision_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'final_project_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'final_project_status' => $this->faker->randomElement($array = array('LULUS', 'LULUS DENGAN REVISI', 'GAGAL')),
        ];
    }
}
