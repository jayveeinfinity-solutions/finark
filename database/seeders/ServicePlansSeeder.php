<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicePlan;

class ServicePlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => "Financial Planning for Adults", 'slug' => "financial-planning-adults"],
            ['name' => "Financial Planning for Children", 'slug' => "financial-planning-children"],
            ['name' => "Insurance Portfolio Review", 'slug' => "insurance-portfolio-review"],
            ['name' => "Savings and Investment Plans", 'slug' => "savings-and-investment-plans"],
            ['name' => "Retirement Planning", 'slug' => "retirement-planning"],
            ['name' => "Loan Advisory", 'slug' => "loan-advisory"],
            ['name' => "Investment Advisory", 'slug' => "investment-advisory"],
            ['name' => "General Insurance", 'slug' => "general-insurance"],
            ['name' => "Estate Planning", 'slug' => "estate-planning"],
            ['name' => "Business Continuity", 'slug' => "business-continuity"]
        ];
        ServicePlan::insert($data);
    }
}
