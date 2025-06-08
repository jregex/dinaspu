<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

// user
Route::get('/', Home::class)->name('home');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');
Route::get('/berita', App\Livewire\Berita\Index::class)->name('berita.index');
Route::get('/berita/{slug}', App\Livewire\Berita\Detail::class)->name('berita.detail');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
