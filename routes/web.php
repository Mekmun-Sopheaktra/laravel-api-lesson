<?php

use App\Http\Controllers\IdentifyCardController;
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


Route::get('/ocr', [IdentifyCardController::class, 'index'])->name('ocr.index');
Route::post('/ocr/scan', [IdentifyCardController::class, 'scan'])->name('ocr.scan');