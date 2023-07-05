<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index_user']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index_user'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\DashboardController::class, 'index_admin'])->name('admin-home')->middleware('role');
Route::get('/data-buku', [AdminController::class, 'show_books'])->name('admin.data-buku')->middleware('role');
Route::get('/data-user', [AdminController::class, 'show_user'])->name('admin.data-user')->middleware('role');
Route::get('/profile', [UsersController::class, 'index_profile'])->name('user.lihat-profile')->middleware('role');
Route::get('/books', [UsersController::class, 'index'])->name('user.daftar-buku')->middleware('role');
