<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => "developer", 'guard_name' => "web"],
            ['name' => "admin", 'guard_name' => "web"],
            ['name' => "virtual-assistant", 'guard_name' => "web"],
            ['name' => "branch-director", 'guard_name' => "web"],
            ['name' => "unit-manager", 'guard_name' => "web"],
            ['name' => "consultant", 'guard_name' => "web"],
            ['name' => "recruiter", 'guard_name' => "web"]
        ];
        Role::insert($data);
    }
}
