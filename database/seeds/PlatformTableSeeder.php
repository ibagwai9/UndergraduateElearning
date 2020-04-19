<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platform')->truncate();

        $faker = \Faker\Factory::create();
        $insts = [
            ['name'=>'Virtual Learning','title'=>'Unified tirtiary learning','url'=>
            '127.0.0.1:8000','logo'=>'127.0.0.1:8000/assets/img/logo.png','email'=>'admin.vlearn.ng',
            'session_id'=>1,'status'=>1]
        ];

        for ($i=0; $i < count($insts); $i++) { 
            DB::table('platform')->insert($insts[$i]);
        }     
    }
}
