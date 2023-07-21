<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HuggingfaceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (Login, Register, etc.)
Auth::routes([
    'reset' => false,
    // 'register' => false
]);
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('/huggingface/query/create', [HuggingfaceController::class, 'showForm'])->name('huggingface.query.create');;
    Route::post('/huggingface/query/result', [HuggingfaceController::class, 'query']);
});
