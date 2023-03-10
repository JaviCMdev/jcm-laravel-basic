<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController as Book;
use App\Http\Controllers\AuthorController as Author;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Books endpoints
Route::get('books',[Book::class, 'index']);
Route::get('books/title={value}',[Book::class, 'getByTitle']);
Route::get('books/{value}',[Book::class, 'getById']);
Route::post('books',[Book::class, 'store']);
Route::post('books/{author_id}',[Book::class, 'postBookWAuthor']);
Route::delete('books/{id}',[Book::class, 'destroy']);
Route::put('books',[Book::class, 'update']);

// Authors endpoints
Route::get('authors',[Author::class, 'index']);
Route::get('authors/title={value}',[Author::class, 'getByTitle']);
Route::get('authors/{value}',[Author::class, 'getById']);
Route::post('authors',[Author::class, 'store']);
Route::delete('authors/{id}',[Author::class, 'destroy']);
Route::put('authors',[Author::class, 'update']);
