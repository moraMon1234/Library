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

Route::get('/create', [BookController::class,'create']);
Route::post('/store', [BookController::class,'store']);
Route::get('/book', [BookController::class,'book']);
Route::get('update/{id}', [BookController::class,'update']);
Route::post('/update', [BookController::class,'execute']);
Route::delete('delete/{id}', [BookController::class,'delete']);
Route::get('/search', [BookController::class, 'search']);
Route::get('show/{id}', [BookController::class, 'show']);




Route::get('/add', [AuthorController::class, 'create']);
Route::post('/Authorstore', [AuthorController::class, 'store']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('edit/{id}', [AuthorController::class, 'edit']);  
Route::post('/edit', [AuthorController::class, 'update']); 
Route::delete('destroy/{id}', [AuthorController::class, 'destroy']);
Route::get('/authorsearch', [AuthorController::class, 'search']);




Route::get('/createstudent', [StudentController::class, 'create']);
Route::post('/studentstore', [StudentController::class, 'store']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('studentedit/{id}', [StudentController::class, 'edit']);  
Route::post('/studentedit', [StudentController::class, 'update']); 
Route::delete('studentdestroy/{id}', [StudentController::class, 'destroy']); 
Route::get('/studentsearch', [StudentController::class, 'search']);
Route::get('studentshow/{id}', [StudentController::class, 'show']);



Route::get('/createcategory', [CategoryController::class, 'create']);
Route::post('/categorystore', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('categoryedit/{id}', [CategoryController::class, 'edit']);  
Route::post('/categoryedit', [CategoryController::class, 'update']); 
Route::delete('categorydestroy/{id}', [CategoryController::class, 'destroy']); 
Route::get('/categorysearch', [CategoryController::class, 'search']);
Route::get('categoryshow/{id}', [CategoryController::class, 'show']);


});