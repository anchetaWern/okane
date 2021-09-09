<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryManagementController;
use App\Http\Controllers\FundsManagementController;
use App\Http\Controllers\TransactionsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/categories', [CategoryManagementController::class, 'index'])->name('categories');

    Route::get('/categories/create', [CategoryManagementController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryManagementController::class, 'store'])->name('categories.store');

    Route::get('/funds', [FundsManagementController::class, 'index'])->name('funds');
    Route::get('/funds/create', [FundsManagementController::class, 'create'])->name('funds.create');
    Route::post('/funds', [FundsManagementController::class, 'store'])->name('funds.store');

    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');
    Route::get('/transactions/create', [TransactionsController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionsController::class, 'store'])->name('transactions.store');
});



require __DIR__.'/auth.php';
