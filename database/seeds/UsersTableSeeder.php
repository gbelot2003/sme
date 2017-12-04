<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gerardo Belot',
                'email' => 'gbelot2003@hotmail.com',
                'state_id' => 1,
                'role' => 'admin',
                'password' => '$2y$10$xx7BucB.Qw9VRglppMdFLeJNMFVEy7T0SGuxrCnjM7VYw9eHeTYLK',
                'remember_token' => NULL,
                'created_at' => '2017-11-25 16:39:51',
                'updated_at' => '2017-11-25 16:39:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Harold Rivera',
                'email' => 'cconect@hotmail.com',
                'state_id' => 1,
                'role' => 'admin',
                'password' => '$2y$10$OxCGfgZAyNTMC2atFgAivOgo2uWJD9ecqEAn1cUgb9nHGXNqYzHei',
                'remember_token' => NULL,
                'created_at' => '2017-12-04 18:12:26',
                'updated_at' => '2017-12-04 18:12:26',
            ),
        ));
        
        
    }
}