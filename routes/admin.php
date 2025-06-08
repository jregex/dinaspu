<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('admin')->middleware(['auth', 'route-check'])->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::delete('/users/{user}', 'destroy')->name('users.delete');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::patch('/users/{user}', 'update')->name('users.update');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users/change-password', [UserController::class, 'change_password'])->name('changepassword');
    Route::post('/users/change-password', [UserController::class, 'updatepassword']);
    Route::get('/users/myprofile', [UserController::class, 'myprofile'])->name('myprofile');
    Route::post('/users/myprofile', [UserController::class, 'update_profile'])->name('myprofile');
    Route::resource('/posts', PostController::class);
    Route::post('posts/upload', [PostController::class, 'upload'])->name('posts.upload');
    Route::get('/posts/publish/{post}', [PostController::class, 'publish'])->name('posts.publish');
    Route::get('/categories', [PostController::class, 'list_categories'])->name('categories.index');
    Route::post('/categories', [PostController::class, 'store_category'])->name('categories.store');
    Route::get('/categories/{category}/edit', [PostController::class, 'edit_category'])->name('categories.edit');
    Route::patch('/categories/{category}', [PostController::class, 'update_category'])->name('categories.update');
    Route::delete('/categories/{category}', [PostController::class, 'destroy_category'])->name('categories.destroy');
    Route::get('/pegawai/export', [PegawaiController::class, 'export_pegawai'])->name('export.pegawai');
    Route::post('/pegawai/export', [PegawaiController::class, 'post_export_pegawai']);
    Route::resource('/pegawai', PegawaiController::class);
    // gallery route
    Route::get('/gallery/{category}', [AdminController::class, 'gallery_list'])->name('galleries.index');
    Route::delete('/gallery/{gallery}', [AdminController::class, 'gallery_destroy'])->name('galleries.destroy');
    Route::delete('/gallery/{category}/all', [AdminController::class, 'gallery_delete'])->name('galleries.delete');
    Route::post('/gallery', [AdminController::class, 'gallery_store'])->name('galleries.store');
    Route::get('/gallery-categories', [AdminController::class, 'gallery_categories_list'])->name('gallery-categories.index');
    Route::post('/gallery-categories', [AdminController::class, 'gallery_categories_store'])->name('gallery-categories.store');
    Route::delete('/gallery-categories/{category}', [AdminController::class, 'gallery_categories_destroy'])->name('gallery-categories.destroy');
    Route::get('/gallery-categories/{category}/edit', [AdminController::class, 'gallery_categories_edit'])->name('gallery-categories.edit');
    Route::patch('/gallery-categories/{category}', [AdminController::class, 'gallery_categories_update'])->name('gallery-categories.update');
    // Route::post('/categories', [PostController::class, 'store_category'])->name('categories.store');
    // Route::get('/categories/{category}/edit', [PostController::class, 'edit_category'])->name('categories.edit');
    // Route::patch('/categories/{category}', [PostController::class, 'update_category'])->name('categories.update');
    // Route::delete('/categories/{category}', [PostController::class, 'destroy_category'])->name('categories.destroy');
    Route::controller(PegawaiController::class)->group(function () {
        Route::get('/jabatan', 'list_jabatans')->name('jabatans.index');
        Route::post('/jabatan', 'store_jabatan')->name('jabatans.store');
        Route::get('/jabatan/{jabatan}/edit', 'edit_jabatan')->name('jabatans.edit');
        Route::patch('/jabatan/{jabatan}', 'update_jabatan')->name('jabatans.update');
        Route::delete('/jabatan/{jabatan}', 'destroy_jabatan')->name('jabatans.destroy');
        Route::get('/jabatan/export', 'export_jabatan')->name('export.jabatan');
        Route::post('/jabatan/export', 'post_export');
    });
});
