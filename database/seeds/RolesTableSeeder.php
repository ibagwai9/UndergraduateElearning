<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        $roles = ['SuperAdmin','SchoolAdmin','Teacher','Student'];
        for ($i=0; $i<count($roles); $i++) {
            
            DB::table('roles')->insert([
                'name' => $roles[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
       
    }
}
