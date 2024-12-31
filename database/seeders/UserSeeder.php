<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Jayvee Infinity',
                'email' => 'jayveeinfinity@gmail.com',
                'password' => Hash::make('password')
            ]
        ];
        User::insert($data);
    }
}
