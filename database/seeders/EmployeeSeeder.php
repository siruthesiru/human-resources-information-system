<?php

namespace Database\Seeders;

use Brick\Math\BigInteger;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();
        
            $faker->locale = 'en_US';
            for ($i=0; $i < 1000; $i++) { 
                DB::table('employees')->insert([
                    'fName' => $faker->firstName(),
                    'lName' => $faker->lastName(),
                    'sex' => $faker->randomElement(['M','F']),
                    // 'emp_id' => random_int(16100000,19999999),
                    // 'position1' => $faker->randomElement(['Accountant', 'Engineer', 'Manager', 'Supervisor', 'Mechanic']),
                    // 'position2' => $faker->randomElement(['Accountant', 'Engineer', 'Manager', 'Supervisor', 'Mechanic']),
                    // 'department' => $faker->randomElement(['Accounting', 'Engineering', 'Human Resources']),
                    'bDate' => Carbon::today()->subDays(rand(6570,18250)),
                    'address' => $faker->country(),
                    'contactNum1' => random_int(9000000000,9999999999),
                    'contactNum2' => $faker->randomElement([NULL, random_int(9000000000,9999999999)]),
                    'profilePicSrc' => NULL
                    // 'employmentStatus' => $faker->randomElement(['Regular', 'Under Probation', 'Project Based', 'Terminated', 'Resigned']),
                    // 'remarks' => NULL,
                ]);
            }
    }
}
