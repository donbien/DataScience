  
<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'faculty' => 'FIT',
            'course' =>'ICS',
            'unit_name' => 'Special Topics (Embedded Systems Design)',
            'unit_code' => 'ICS 4103',
            ]);
        DB::table('units')->insert([
            'faculty' => 'FIT',
            'course' =>'ICS',
            'unit_name' => 'Information Systems Security and Design',
            'unit_code' => 'ICS 4105',
        ]);
        DB::table('units')->insert([
            'faculty' => 'FIT',
            'course' =>'ICS',
            'unit_name' => 'Computer Simulations and Modeling ',
            'unit_code' => 'ICS 4106',
        ]);
        DB::table('units')->insert([
            'faculty' => 'FIT',
            'course' =>'ICS',
            'unit_name' => 'Distributed Systems ',
            'unit_code' => 'ICS 4104',
        ]);
        DB::table('units')->insert([
            'faculty' => 'FIT',
            'course' =>'ICS',
            'unit_name' => 'Artificial neural Networks and Pattern Recognition',
            'unit_code' => 'ICS 4102',
        ]);
    }
}
