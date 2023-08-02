<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Livewire\BookCrud;



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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard Routes

Route::prefix('admin/')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Category Routes
    Route::resource('category', CategoryController::class);

    // Delete Method using Livewire Component

    Route::get('/delete', App\Http\Livewire\Admin\Category\Index::class); // TODO

    // Brands using Livewire Component
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class)->name('brands');

    // Route::get('/books', BookCrud::class)->name('books');

});
