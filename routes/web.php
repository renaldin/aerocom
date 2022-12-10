<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Users;
use App\Http\Controllers\C_Categories;
use App\Http\Controllers\C_Products;
use App\Http\Controllers\C_News;
use App\Http\Controllers\C_Mahasiswa;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_Login;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/register', [C_Register::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'level:1'])->group(function () {

    // categories
    Route::get('/categories', [C_Categories::class, 'index'])->name('categories');
    Route::get('/add-categories', [C_Categories::class, 'add']);
    Route::post('/insert-categories', [C_Categories::class, 'insert']);
    Route::get('/edit-categories/{id}', [C_Categories::class, 'edit']);
    Route::post('/update-categories/{id}', [C_Categories::class, 'update']);
    Route::get('/delete-categories/{id}', [C_Categories::class, 'delete']);

    // products
    Route::get('/products', [C_Products::class, 'index'])->name('products');
    Route::get('/add-product', [C_Products::class, 'add']);
    Route::post('/insert-product', [C_Products::class, 'insert']);
    Route::get('/edit-product/{id}', [C_Products::class, 'edit']);
    Route::post('/update-product/{id}', [C_Products::class, 'update']);
    Route::get('/delete-product/{id}', [C_Products::class, 'delete']);

    // news
    Route::get('/news', [C_News::class, 'index'])->name('news');
    Route::get('/add-news', [C_News::class, 'add']);
    Route::post('/insert-news', [C_News::class, 'insert']);
    Route::get('/edit-news/{id}', [C_News::class, 'edit']);
    Route::post('/update-news/{id}', [C_News::class, 'update']);
    Route::get('/delete-news/{id}', [C_News::class, 'delete']);

    // users
    Route::get('/users', [C_Users::class, 'index'])->name('users');
    Route::get('/add-user', [C_Users::class, 'add']);
    Route::post('/insert-user', [C_Users::class, 'insert']);
    Route::get('/edit-user/{id}', [C_Users::class, 'edit']);
    Route::post('/update-user/{id}', [C_Users::class, 'update']);
    Route::get('/delete-user/{id}', [C_Users::class, 'delete']);
});
