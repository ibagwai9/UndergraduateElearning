<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('admins')->truncate();
        
        $id =DB::table('admins')->insertGetId([
            'phone' => '08035384184',
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'admin@vlearn.edu.ng',
            'userable_id' => 1,
            'userable_type' => 'App\Admin',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
