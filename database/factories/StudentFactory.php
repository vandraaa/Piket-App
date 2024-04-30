<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_siswa' => $this->faker->name,
            'kelas' => $this->faker->randomElement(['XI RPL A', 'XI RPL B', 'XI RPL C']),
            'nis' => $this->faker->unique()->randomNumber(5)
        ];
    }
}
