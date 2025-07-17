<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
     // Dashboard User: List laporan user
     public function index()
     {
        $user = Auth::user();

        // Ambil semua report milik user
        // $reports = $user->reports()->with('category')->latest()->get();

        // Statistik
        $totalReports = Report::where('user_id', $user->id)->count();
        $pendingReports = Report::where('user_id', $user->id)
                                ->where('status_fixed', false)
                                ->count();
        $resolvedReports = Report::where('user_id', $user->id)
                                 ->where('status_fixed', true)
                                 ->count();
        $recentReports = Report::where('user_id', $user->id)
                               ->latest()
                               ->take(5)
                               ->get();

        return view('user.dashboard', compact(
            'totalReports',
            'pendingReports',
            'resolvedReports',
            'recentReports'
        ));
     }

     // Form buat laporan baru
     public function create()
     {
         $categories = Category::all();
         return view('user.reports.create', compact('categories'));
     }

     // Simpan laporan baru
     public function store(Request $request)
     {
         $request->validate([
             'image'          => 'required|image|max:2048',
             'latitude'       => 'required|numeric',
             'longitude'      => 'required|numeric',
             'location_detail'=> 'required|string',
             'description'    => 'required|string',
             'category_id'    => 'required|exists:categories,id',
         ]);

         $imagePath = $request->file('image')->store('reports', 'public');

         Report::create([
             'user_id'        => Auth::id(),
             'category_id'    => $request->category_id,
             'image_path'     => $imagePath,
             'latitude'       => $request->latitude,
             'longitude'      => $request->longitude,
             'location_detail'=> $request->location_detail,
             'description'    => $request->description,
             'status_sent'    => true,
             'status_verified'=> false,
             'status_fixed'   => false,
         ]);

         return redirect()->route('user.dashboard')->with('success', 'Laporan berhasil dikirim.');
     }
}
