<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('type',[TypeController::class, 'index']);
Route::get('type/{id}',[TypeController::class, 'show']);

Route::get('transaccion',[TransactionController::class,'index']);
Route::post('transaccion',[TransactionController::class,'store']);