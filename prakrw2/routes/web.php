<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::middleware('auth')->group(function () {

    // CRUD Mahasiswa (Diproteksi dari Guest)
    Route::resource('mahasiswas', MahasiswaController::class);

    Route::resource('posts', PostController::class)
        ->except(['index']); 

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';