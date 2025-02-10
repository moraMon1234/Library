<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

// Route::get('/books/create', 'BookController@create');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', [BookController::class,'create']);
Route::post('/store', [BookController::class,'store']);
Route::get('/book', [BookController::class,'book']);
Route::get('update/{id}', [BookController::class,'update']);
Route::post('/update', [BookController::class,'execute']);
Route::delete('delete/{id}', [BookController::class,'delete']);


// Route::resource('authors', AuthorController::class);



Route::get('/add', [AuthorController::class, 'create']);
Route::post('/Authorstore', [AuthorController::class, 'store']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('edit/{id}', [AuthorController::class, 'edit']);  // ✅ عرض صفحة التعديل
Route::post('/edit', [AuthorController::class, 'update']);  // ✅ حفظ التحديثات
Route::delete('destroy/{id}', [AuthorController::class, 'destroy']); // ✅ حذف
