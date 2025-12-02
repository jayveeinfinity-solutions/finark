<?php

namespace Database\Seeders;

use App\Models\Forum\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'name' => 'Breakfast Club',
                'slug' => 'breakfast-club',
                'description' => 'Intention setting and sharing session.'
            ],
            [
                'name' => 'Announcements',
                'slug' => 'announcements',
                'description' => 'General announcements for all financial advisors.'
            ],
            [
                'name' => 'Seminars & Workshops',
                'slug' => 'seminars-workshops',
                'description' => 'Events for Financial Planning, Retirement Planning, Estate Planning, etc.'
            ],
            [
                'name' => 'Training & Development',
                'slug' => 'training-development',
                'description' => 'In-person and virtual training sessions for advisors.'
            ],
        ];

        foreach ($sections as $section) {
            Section::firstOrCreate(['slug' => $section['slug']], $section);
        }
    }
}
