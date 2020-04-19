<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->truncate();

        $faker = \Faker\Factory::create();
        $insts = [
            ['name'=>'Chemistry','title'=>'Bsc Chemistry','max_sessions'=>4,'faculty_id'=>1],
            ['name'=>'Chemistry Education','title'=>'Bsc (Ed) Chemistry','max_sessions'=>4,'faculty_id'=>4],
            ['name'=>'Biology','title'=>'Bsc Biology','max_sessions'=>4,'faculty_id'=>1],
            ['name'=>'Biology Education','title'=>'Bsc (Ed) Biology','max_sessions'=>4,'faculty_id'=>4],
            ['name'=>'Geography Education','title'=>'Bsc (Ed) Geography','max_sessions'=>4,'faculty_id'=>4],
        ];

        for ($i=0; $i < count($insts); $i++) { 
            DB::table('programs')->insert($insts[$i]);
        }     
    }
}
