<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
}
