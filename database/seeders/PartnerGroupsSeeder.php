<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerGroupsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('partner_groups')->delete();
        
        DB::table('partner_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Group Employee Benefits',
                'icon' => 'group-employee-benefits-icon.png',
                'sequence' => 7,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-03-10 04:02:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'General Insurance',
                'icon' => 'general-insurance-icon.png',
                'sequence' => 6,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-03-10 04:02:50',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Life Insurance',
                'icon' => 'life-insurance-icon.png',
                'sequence' => 1,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-03-10 04:02:29',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Global Health Plans',
                'icon' => 'global-health-plans-icon.png',
                'sequence' => 8,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-03-10 04:02:45',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Distributor Agreements',
                'icon' => NULL,
                'sequence' => 9,
                'active' => 0,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-08-27 00:55:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Introducer Agreements',
                'icon' => NULL,
                'sequence' => 10,
                'active' => 0,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-08-27 00:55:41',
            ),
            6 => 
            array (
                'id' => 7,
            'name' => 'Bank (Home Loans)',
                'icon' => 'bank-partners-icon.png',
                'sequence' => 4,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:52:06',
                'updated_at' => '2023-03-10 04:02:35',
            ),
            7 => 
            array (
                'id' => 8,
            'name' => 'Bank (Commercial Loans)',
                'icon' => 'bank-partners-icon.png',
                'sequence' => 5,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 02:15:47',
                'updated_at' => '2023-03-10 04:02:38',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Asset Managers',
                'icon' => 'asset-managers-icon.png',
                'sequence' => 3,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 09:47:04',
                'updated_at' => '2023-03-10 04:02:58',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Investment Platforms',
                'icon' => 'investment-platform-icon.png',
                'sequence' => 2,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 09:55:58',
                'updated_at' => '2023-03-10 04:03:09',
            ),
        ));
        
        
    }
}