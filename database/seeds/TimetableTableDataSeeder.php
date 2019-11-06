<?php

use Illuminate\Database\Seeder;

class TimetableTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    $faker = \Faker\Factory::create();

    for($i = 0; $i < 1000; $i++) {
        App\Timetable::create([
        'faculty' => $faker->faculty,
     	'study_year' => $faker->study_year,
        'session_start' => $faker->session_start,
        'session_end' => $faker->session_end,
   		'unit_name' => $faker->unit_name,
     	'unit_code' => $faker->unit_code,
        'day_of_the_week' => $faker->day_of_the_week,
        'time' => $faker->time,
        'lecturer' => $faker->lecturer,
        ]);
    }
}
