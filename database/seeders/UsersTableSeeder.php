<?php

namespace Database\Seeders;

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
                'name' => 'Raúl Alberto López Moreno',
                'email' => 'raullopezsv@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Al8qOSkOf/t0uc8W8dJmNeMWaiJT2EHtdjrYhqFBz24/Yd93TZnPa',
                'remember_token' => NULL,
                'created_at' => '2022-02-24 03:57:47',
                'updated_at' => '2022-02-24 03:57:47',
            ),
        ));
        
        
    }
}