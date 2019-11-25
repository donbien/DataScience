<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_units')->insert([
            'student_number' => '094567',
            'unit_code' => 'ICS 4103',
            'marks' => '75',
                    ]);
        DB::table('student_units')->insert([
            'student_number' => '094567',
            'unit_code' => 'ICS 4104',
                    ]);
        DB::table('student_units')->insert([
            'student_number' => '094567',
            'unit_code' => 'ICS 4102',
            'marks' => '40',
                    ]);
        DB::table('student_units')->insert([
            'student_number' => '094567',
            'unit_code' => 'ICS 4105',
            'marks' => '38.8',
                    ]);
        DB::table('student_units')->insert([
            'student_number' => '094567',
            'unit_code' => 'ICS 4106',
            'marks' => '35.9',
                    ]);
        DB::table('student_units')->insert([
            'student_number' => '094560',
            'unit_code' => 'ICS 4103',
            'marks' => '40',
        ]);
        DB::table('student_units')->insert([
            'student_number' => '094560',
            'unit_code' => 'ICS 4104',
            'marks' => '80',
        ]);
        DB::table('student_units')->insert([
            'student_number' => '094560',
            'unit_code' => 'ICS 4102',
        ]);
        DB::table('student_units')->insert([
            'student_number' => '094560',
            'unit_code' => 'ICS 4105',
            'marks' => '36.8',
        ]);
        DB::table('student_units')->insert([
            'student_number' => '094560',
            'unit_code' => 'ICS 4106',
            'marks' => '39.2',
        ]);
    }
}<?php

use Illuminate\Database\Seeder;

class unitsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
