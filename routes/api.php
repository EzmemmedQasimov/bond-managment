<?php

use App\Http\Controllers\BondController;
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

Route::get('/bond/{id}/payouts',[BondController::class,'payouts'])->name('bond.payouts');
Route::post('/bond/{id}/order',[BondController::class,'order'])->name('bond.order');
Route::post('/bond/order/{id}',[BondController::class,'amount'])->name('bond.amount');