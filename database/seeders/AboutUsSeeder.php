<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title' => 'About Our Company',
            'description' => 'We are a leading company in providing innovative solutions for businesses worldwide. Our team of experts is dedicated to delivering high-quality services that exceed our clients\' expectations.',
            'mission' => 'To provide innovative and reliable solutions that help businesses grow and succeed in today\'s competitive market.',
            'vision' => 'To be the global leader in technology solutions, recognized for our commitment to excellence and customer satisfaction.',
            'values' => 'Innovation, Integrity, Excellence, Customer Focus, Teamwork, and Continuous Learning.',
            'years_experience' => 10,
            'projects_completed' => 150,
            'happy_clients' => 200,
            'is_active' => true,
        ]);
    }
}
