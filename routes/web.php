<?php

use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home
Route::get('/', [HomeController::class, 'pageHome'])->name('home');

// Dictionary
Route::get('/dictionary/indonesia', [DictionaryController::class, 'showListIndonesia'])->name('list-indonesia');
Route::get('/dictionary/indonesia/{alphabet}', [DictionaryController::class, 'showListIndonesiaByAlphabet'])->name('list-indonesia-alphabet');
Route::get('/dictionary/english', [HomeController::class, 'pageHome'])->name('list-english');

// Word
Route::get('/word/{id}', [DictionaryController::class, 'showWordDetail'])->name('word-detail');