<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jayvee Infinity',
                'email' => 'jayveeinfinity@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lebron James',
                'email' => 'lebronjames@nba.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 17:52:43',
                'updated_at' => '2023-08-26 17:52:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Kyrie Irving',
                'email' => 'kyrieirving@nba.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 17:53:29',
                'updated_at' => '2023-08-26 17:53:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Anthony Davis',
                'email' => 'anthonydavis@nba.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 17:54:41',
                'updated_at' => '2023-08-26 17:54:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tim Cone',
                'email' => 'timecone@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 17:59:17',
                'updated_at' => '2023-08-27 07:15:42',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 17:59:49',
                'updated_at' => '2023-08-26 17:59:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 18:00:36',
                'updated_at' => '2023-08-26 18:00:36',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jane Doe',
                'email' => 'janedoe@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 18:00:54',
                'updated_at' => '2023-08-26 18:00:54',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'test2',
                'email' => 'test5@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 0,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 18:03:52',
                'updated_at' => '2023-08-27 07:50:13',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'test3',
                'email' => 'test3@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 0,
                'remember_token' => NULL,
                'created_at' => '2023-08-26 18:09:33',
                'updated_at' => '2023-08-27 07:58:33',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Administrator',
                'email' => 'financialark@fin-ark.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-27 01:31:22',
                'updated_at' => '2023-08-27 01:31:22',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Jeff Doe',
                'email' => 'jeffdoe@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUJ/cQ3jsd011dN80TyNW.4L81.3axOyVk3559DSvZiQ6zNK0KY/u',
                'active' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-08-27 06:45:14',
                'updated_at' => '2023-08-27 06:45:14',
            ),
        ));
        
        
    }
}