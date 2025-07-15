<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('home');

// Route::get('/news', function () {
//     return view('news');
// })->name('news');

// Route::get('/reports', function () {
//     return view('reports');
// })->name('reports');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::get('/privacy', function () {
//     return view('privacy');
// })->name('privacy');

// Route::get('/terms', function () {
//     return view('terms');
// })->name('terms');

// Auth routes
// Auth::routes();
