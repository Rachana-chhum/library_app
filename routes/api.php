<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\MemberController;


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


Route::apiResource('categories', CategoryController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('members', MemberController::class);
Route::apiResource('librarians', LibrarianController::class);
Route::apiResource('borrowers', BorrowerController::class);
