<?php

use App\Http\Controllers\TelegramController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('/language/{lang}', [LanguageController::class, 'switch'])->name('language.switch');

// Main pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/design', [PageController::class, 'design'])->name('design');
Route::get('/automation', [PageController::class, 'automation'])->name('automation');
Route::get('/arvr', [PageController::class, 'arvr'])->name('arvr');
Route::get('/vacancies', [PageController::class, 'vacancies'])->name('vacancies');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// API
Route::post('/api/submit', [TelegramController::class, 'appendRow']);