<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        $this->call([
            'RolesTableSeeder',
            'InstitutionsTableSeeder',
            'FacultiesTableSeeder',
            'UsersTableSeeder',
            'FercilitatorsTableSeeder',
            'StudentsTableSeeder',
            'ProgramsTableSeeder',
            'SessionTableSeeder',
            'PlatformTableSeeder',
        ]);
        
        

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
