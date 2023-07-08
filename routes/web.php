<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BooksController;


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

Route::get('/', function () {
    return view('landing-page');
});
// Route::get('/', [DashboardController::class, 'index_user']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index_user'])->name('home');
Route::get('/profile', [UserController::class, 'index_profile'])->name('user.lihat-profile');
Route::get('/books', [UserController::class, 'index'])->name('user.daftar-buku');
Route::get('/books/{id}', [BooksController::class, 'show'])->name('user.details-buku');
//ADMIN
Route::get('/admin/home', [App\Http\Controllers\DashboardController::class, 'index_admin'])->name('admin-home')->middleware('role');
Route::get('/data-buku', [AdminController::class, 'show_books'])->name('admin.data-buku')->middleware('role');
Route::get('/data-user', [AdminController::class, 'show_user'])->name('admin.data-user')->middleware('role');
// Route::get('/data-buku/{id}', [AdminController::class, 'show_more_details'])->name('admin.more-details')->middleware('role');
Route::delete('/data-buku/{books}', [AdminController::class, 'destroy_books'])->name('books.destroy');
Route::delete('/data-user/{user}', [AdminController::class, 'destroy_user'])->name('user.destroy');
Route::post('/seminar/approve/{id}', [AdminController::class, 'approve'])->name('approve');
Route::delete('/seminar/reject/{id}', [AdminController::class, 'reject'])->name('reject');
Route::get('/data-buku/create', [AdminController::class, 'index_create_books'])->name('books-create');
Route::resource('/data-edit',AdminController::class);
Route::post('/add-books', [AdminController::class, 'store_books'])->name('books.store');
Route::get('/data-buku/{id}/edit', [AdminController::class, 'edit_books'])->name('books.edit');
Route::put('/data-buku/{id}', [AdminController::class, 'update_books'])->name('data-books.update');
Route::get('/data-user/create', [AdminController::class, 'index_create_user'])->name('user-create');
Route::get('/data-user/create', [AdminController::class, 'index_create_user'])->name('user-create');
Route::post('/add-user', [AdminController::class, 'store_user'])->name('user.store');
Route::get('/data-user/{id}/edit', [AdminController::class, 'edit_user'])->name('user.edit');
Route::put('/data-user/{id}', [AdminController::class, 'update_user'])->name('data-user.update');
