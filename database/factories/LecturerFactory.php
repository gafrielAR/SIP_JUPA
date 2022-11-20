<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $no = 0;

        return [
            'name'                  => $this->faker->name(),
            'nip'                   => $this->faker->date($format = 'YmdYmd', $max = 'now')+$no++,
            'position'              => null,
            'years_of_service'      => $this->faker->numberBetween($min = 1, $max = 99),
            'months_of_service'     => $this->faker->month(),
            'study_program_id'      => $this->faker->numberBetween($min = 1, $max = 16),
            'status'                => $this->faker->randomElement($array = array ('active','inactive')),
            'birth_date'            => $this->faker->date(),
            'birth_place'           => $this->faker->city(),
            'gender'                => $this->faker->randomElement($array = array ('men','women')),
            'citizenship'           => $this->faker->randomElement($array = array ('WNI','WNA', 'WNI', 'WNI')),
            'religion_id'           => $this->faker->numberBetween($min = 1, $max = 6),
            'blood_type'            => $this->faker->randomElement($array = array ('A','O', 'B', 'AB')),
            'address'               => $this->faker->address(),
            'phone'                 => $this->faker->phoneNumber(),
            'direct_supervisor_id'  => null,
            'nidn_nupn'             => null,
            'karis_karsus'          => null,
        ];
    }
}
