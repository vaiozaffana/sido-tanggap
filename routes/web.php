<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $articles = Article::with('report.user')->latest()->get();
    return view('homepage', compact('articles'));
})->name('home');

Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth.page');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');

    // Reports
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/reports/{report}', [AdminController::class, 'showReport'])->name('reports.show');
    Route::patch('/reports/{report}/verify', [AdminController::class, 'verifyReport'])->name('reports.verify');
    Route::patch('/reports/{report}/resolve', [AdminController::class, 'resolveReport'])->name('reports.resolve');

    // Admin dapat melihat articles (opsional, kalau ada)
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/admin/articles/{article}', [AdminController::class, 'show'])->name('articles.show');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');

    // Reports (My Reports)
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');

    // Articles (Publik)
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
});
