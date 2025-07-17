<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::create([
            'name' => 'Dummy User',
            'email' => 'dummy@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $category = Category::first() ?? Category::create([
            'name' => 'Kebersihan',
            'description' => 'Laporan tentang kebersihan lingkungan',
        ]);

        Report::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'image_path' => 'images/report1.jpg',
            'latitude' => '-7.250445',
            'longitude' => '112.768845',
            'location_detail' => 'Jl. Contoh No.1',
            'description' => 'Sampah menumpuk di pinggir jalan.',
            'status_sent' => true,
            'status_verified' => false,
            'status_fixed' => false,
        ]);
    }
}
