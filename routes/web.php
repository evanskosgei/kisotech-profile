<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

Route::get('/', [ViewController::class, 'index']);
Route::get('/about', [ViewController::class, 'about']);
Route::get('/service', [ViewController::class, 'service']);
Route::get('mission', [ViewController::class, 'mission']);
Route::get('vision', [ViewController::class, 'vision']);
Route::get('projects', [ViewController::class, 'projects']);
Route::get('faq', [ViewController::class, 'faq']);
Route::get('contact', [ViewController::class, 'contact']);