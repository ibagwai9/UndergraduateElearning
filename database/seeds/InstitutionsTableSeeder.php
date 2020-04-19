<?php

use App\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->truncate();
        $faker = \Faker\Factory::create();
        $insts = [
            ['title'=>'Bayero University, Kano','acroname'=>'BUK','website'=>'www.buk.edu.ng','logo'=>'www.buk.edu.ng/logo.png', 'email'=>$faker->safeEmail, 'zip'=>'4564', 'address'=>'BUK Road, Kano'],
            ['title'=>'Ahmadu Bello University, Zaria','acroname'=>'ABU','website'=>'www.abu.edu.ng','logo'=>'www.abu.edu.ng/logo.png','email'=>$faker->safeEmail,'zip'=>'4504', 'address'=>'Samaru Zariya']
        ];

        for ($i=0; $i < count($insts); $i++) { 
            DB::table('institutions')->insert($insts[$i]);
        }     
    }
}
