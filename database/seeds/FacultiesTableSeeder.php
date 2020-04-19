<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->truncate();

        $faker = \Faker\Factory::create();
        $insts = ['Sciences','Social Sciences','Medical Sciences','Education','Engineering'];

        for ($i=0; $i < count($insts); $i++) { 
            DB::table('faculties')->insert(['name'=>$insts[$i]]);
        }     
    }
}
