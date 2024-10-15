<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// Route::get('transaccion', [TransactionController::class, 'index']);
// Route::post('transaccion', [TransactionController::class, 'store']);
// Route::put('transaccion/{id}', [TransactionController::class, 'update']);
// Route::delete('transaccion/{id}', [TransactionController::class, 'destroy']);

// Route::group([

//     'middleware' => 'api'

// ], function ($router) {

//     Route::get('type', [TypeController::class, 'index']);
//     Route::get('type/{id}', [TypeController::class, 'show']);
// });


// Route::group([

//     'middleware' => 'auth:api'

// ], function ($router) {
//     Route::get('transaccion', [TransactionController::class, 'index']);
//     Route::post('transaccion', [TransactionController::class, 'store']);
//     Route::put('transaccion/{id}', [TransactionController::class, 'update']);
//     Route::delete('transaccion/{id}', [TransactionController::class, 'destroy']);
// });

Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::group([
    'middleware'=>'auth:api',
], function (){
    Route::apiResource('transaccion',TransactionController::class);
    Route::apiResource('type',TypeController::class);
});