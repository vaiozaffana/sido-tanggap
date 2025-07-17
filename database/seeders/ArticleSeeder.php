<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $report = Report::first(); // Ambil satu report yang sudah ada

        if ($report) {
            Article::create([
                'report_id' => $report->id,
                'title' => 'Penanganan Sampah di Pinggir Jalan',
                'content' => 'Dinas Kebersihan telah menindaklanjuti laporan dan membersihkan sampah pada tanggal 10 Juli.',
                'image_path' => 'images/article1.jpg',
                'published_at' => Carbon::now(),
            ]);
        }
    }
}
