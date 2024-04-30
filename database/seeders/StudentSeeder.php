<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Student::factory()->count(25)->create(['kelas' => 'XI RPL A']);

        Student::factory()->count(25)->create(['kelas' => 'XI RPL B']);

        Student::factory()->count(25)->create(['kelas' => 'XI RPL C']);
    }

}
