<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate([
                'email' => 'admin@app.com'
            ],
            [
                'name' => 'Admin',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
