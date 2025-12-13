<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;

// ROUTING HALAMAN PUBLIK
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// BLOG POST INDEX (PUBLIK - Read Only)
// Ini adalah route untuk menampilkan daftar semua post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// ROUTING TERPROTEKSI (HARUS LOGIN)
Route::middleware('auth')->group(function () {

    // CRUD Mahasiswa (Diproteksi dari Guest)
    Route::resource('mahasiswas', MahasiswaController::class);

    // CRUD Post (Create/Store/Show/Edit/Update/Delete)
    // Karena kita ingin show dan index bisa diakses public/guest, 
    // kita gunakan Route::resource() tanpa except untuk memudahkan, 
    // lalu kita timpa show dan index yang seharusnya di-handle resource
    Route::resource('posts', PostController::class)
        ->except(['index']); // Kecualikan index, karena sudah ada di luar middleware

    // Dashboard Bawaan (Breeze)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Route Profile Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';