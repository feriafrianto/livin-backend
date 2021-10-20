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
                'first_name' => 'Livin',
                'last_name' => 'Admin',
                'email' => 'admin@livin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$z7phYX0mSX1tyzVC54wzOuq67H/7fB0jDxjvO4awjHZxVnGdYViuK',
                'account_type' => 'Personal',
                'gender' => 'Male',
                'remember_token' => NULL,
                'created_at' => '2021-10-15 13:38:44',
                'updated_at' => '2021-10-15 13:38:44',
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Feri',
                'last_name' => 'Afrianto',
                'email' => 'feri@livin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SdaUdftKc/MHBZnAU1pyWObYtDAJYl1bTThnM5ogrd2vRzEhrVo3W',
                'account_type' => 'Personal',
                'gender' => 'Male',
                'remember_token' => NULL,
                'created_at' => '2021-10-20 07:02:14',
                'updated_at' => '2021-10-20 07:02:14',
            ),
        ));
        
        
    }
}