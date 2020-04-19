<?php

use App\Student as Teacher;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 10) as $range) {
            $id = DB::table('students')->insertGetId(array(
                'name' => $faker->name,
                'gender' => $faker->randomElement(array('Male','Female')),
                'dob' => now(),
                'reg_no' => Str::random(10),
                'institution_id' => $faker->numberBetween(1, 2),
                'faculty_id' => $faker->numberBetween(1,5),
                'program_id' => $faker->numberBetween(1,5),
                'level' => $faker->numberBetween(1,4),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ));

            DB::table('users')->insert(array(
                'username'=> $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'userable_id'=>$id,
                'userable_type'=>"App\\Student",
                'password' => bcrypt('123456'),  
            ));
        }
    }
}
