<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalReports = Report::where('user_id', $user->id)->count();
        $recentReports = Report::where('user_id', $user->id)
                               ->latest()
                               ->take(5)
                               ->get();

        return view('user.dashboard', [
            'user' => $user,
            'totalReports' => $totalReports,
            'recentReports' => $recentReports,
        ]);
    }
}
