<?php

use App\Fercilitator as Teacher;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FercilitatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fercilitators')->truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 10) as $range) {
            $id = DB::table('fercilitators')->insertGetId(array(
                'name' => $faker->name,
                'gender' => 'male',
                'dob' => now(),
                'institution_id' => $faker->numberBetween(1, 2),
                'faculty_id' => $faker->numberBetween(1,5),
                'course_id' => $faker->numberBetween(1,5),
                'role_id' => 3,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ));

            DB::table('users')->insert(array(
                'username'=> $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'userable_id'=>$id,
                'userable_type'=>"App\\Fercilitator",
                'password' => bcrypt('123456'),  
            ));
        }
    }
}
