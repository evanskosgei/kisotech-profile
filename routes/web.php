<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [ViewController::class, 'index']);
Route::get('/about', [ViewController::class, 'about']);
Route::get('/service', [ViewController::class, 'service']);
Route::get('mission', [ViewController::class, 'mission']);
Route::get('vision', [ViewController::class, 'vision']);
Route::get('projects', [ViewController::class, 'projects']);
Route::get('faq', [ViewController::class, 'faq']);
Route::get('contact', [ViewController::class, 'contact']);

// saving blog
Route::get('/blogs', [ViewController::class, 'blogs'])->name('blog');
Route::post('/blog/create', [BlogController::class, 'create']);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/addblog', [HomeController::class, 'create'])->name('addblog');
Route::post('/create/blog', [HomeController::class, 'store'])->name('create.blog');
Route::delete('/delete/blog/{id}', [HomeController::class, 'delete'])->name('delete');
Route::get('/blog/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::put('/blog/update/{id}', [HomeController::class, 'update'])->name('update');
