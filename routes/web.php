<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;

// Route::get('/books/create', 'BookController@create');


Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('auth.handleRegister');


Route::get('/', function () {return view('auth.login');})->name('auth.login');

Route::post('/', [AuthController::class, 'handleLogin'])->name('auth.handlelogin');

Route::get('/welcome', function () {
    return view('welcome');
});


Route::middleware([AdminMiddleware::class])->group(function () {

Route::get('/bookcreate', [BookController::class,'create']);
Route::post('/bookstore', [BookController::class,'store']);
Route::get('/book', [BookController::class,'book']);
Route::get('bookupdate/{id}', [BookController::class,'update']);
Route::post('/bookupdate', [BookController::class,'execute']);
Route::delete('bookdelete/{id}', [BookController::class,'delete']);
Route::get('/booksearch', [BookController::class, 'search']);
Route::get('bookshow/{id}', [BookController::class, 'show']);




Route::get('/authorcreate', [AuthorController::class, 'create']);
Route::post('/authorstore', [AuthorController::class, 'store']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('authorupdate/{id}', [AuthorController::class, 'edit']);  
Route::post('/authorupdate', [AuthorController::class, 'update']); 
Route::delete('authordelete/{id}', [AuthorController::class, 'destroy']);
Route::get('/authorsearch', [AuthorController::class, 'search']);
Route::get('authorshow/{id}', [AuthorController::class, 'show']);




Route::get('/studentcreate', [StudentController::class, 'create']);
Route::post('/studentstore', [StudentController::class, 'store']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('studentupdate/{id}', [StudentController::class, 'edit']);  
Route::post('/studentupdate', [StudentController::class, 'update']); 
Route::delete('studentdelete/{id}', [StudentController::class, 'destroy']); 
Route::get('/studentsearch', [StudentController::class, 'search']);
Route::get('studentshow/{id}', [StudentController::class, 'show']);



Route::get('/categorycreate', [CategoryController::class, 'create']);
Route::post('/categorystore', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('categoryupdate/{id}', [CategoryController::class, 'edit']);  
Route::post('/categoryupdate', [CategoryController::class, 'update']); 
Route::delete('categorydelete/{id}', [CategoryController::class, 'destroy']); 
Route::get('/categorysearch', [CategoryController::class, 'search']);
Route::get('categoryshow/{id}', [CategoryController::class, 'show']);


});