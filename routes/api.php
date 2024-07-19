<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('customers/{customer}', [CustomerController::class,'show']);
    Route::patch('customers/{id}', [CustomerController::class,'update']);
    Route::delete('customers/{id}', [CustomerController::class,'destroy']);
    // Route::post('customers/export', [CustomerController::class,'export']);
    Route::post('customers', [CustomerController::class,'store']);
    Route::get('customers', [CustomerController::class,'index']);


    Route::get('customers/{customerId}/notes/{id}', [NotesController::class,'show']);
    Route::patch('customers/{customerId}/notes/{id}', [NotesController::class,'update']);
    Route::delete('customers/{customerId}/notes/{id}', [NotesController::class,'destroy']);
    Route::post('customers/{customerId}/notes', [NotesController::class,'store']);
    Route::get('customers/{customerId}/notes', [NotesController::class,'index']);

    Route::post('customers/{customerId}/projects', [ProjectController::class,'store']);

});

Route::post('users', [UserController::class,'create'] );


