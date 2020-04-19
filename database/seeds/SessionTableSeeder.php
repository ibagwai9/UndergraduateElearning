<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->truncate();

        $faker = \Faker\Factory::create();
        $row = [
            ['name'=>'2019/2020 Academic session','status'=>1, 
            'resuming_time'=>now(),	'closing_time'=>now()]
        ];

        for ($i=0; $i < count($row); $i++) { 
            DB::table('sessions')->insert($row[$i]);
        }     
    }
}
