<?php

use App\Http\Controllers\ScrapperController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scrapper', [ScrapperController::class,'scrapper'])->name('scrapper');
Route::get('/scrapper/export', [ScrapperController::class,'export'])->name('scrapper.export');

