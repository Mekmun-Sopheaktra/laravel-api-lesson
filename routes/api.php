<?php

use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create-seller', [SellerController::class, 'store'])->name('sellers.store');
Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
Route::get('/sellers/{id}', [SellerController::class, 'show'])->name('sellers.show');
