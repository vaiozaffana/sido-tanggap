<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $totalReports = Report::count();
        $totalUsers = User::where('role', 'user')->count();
        $recentReports = Report::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalReports' => $totalReports,
            'totalUsers' => $totalUsers,
            'recentReports' => $recentReports,
        ]);
    }
    // Dashboard Admin
    public function dashboard()
    {
        // Ambil semua laporan yang belum selesai
        $reports = Report::where('status_fixed', false)
            ->latest()
            ->paginate(10);

        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'reports' => $reports
        ]);
    }

    public function reports()
    {
        // Ambil semua laporan yang sudah selesai
        $reports = Report::where('status_fixed', true)
            ->latest()
            ->paginate(10);

        return view('admin.reports.show', [
            'title' => 'Laporan Selesai',
            'reports' => $reports
        ]);
    }

    // Detail laporan
    public function showReport(Report $report)
    {
        if (!Auth::user()->adminCategories->contains($report->category_id)) {
            abort(403);
        }
        return view('admin.reports.show', compact('report'));
    }

    public function show(Article $article)
    {
        $article->load('report.user'); // Untuk akses report dan nama pelapor
        return view('admin.articles.show', compact('article'));
    }


    // Verifikasi laporan
    public function verifyReport(Report $report)
    {
        // if (!Auth::user()->adminCategories->contains($report->category_id)) {
        //     abort(403);
        // }

        $report->update(['status_verified' => true]);

        return redirect()->back()->with('success', 'Laporan telah dikonfirmasi.');
    }

    public function resolveReport(Report $report)
    {
        $report->update(['status_fixed' => true]);

        return redirect()->back()->with('success', 'Laporan ditandai sebagai selesai.');
    }
}
