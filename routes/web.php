<?php

use App\Http\Controllers\Admin\AppiaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Travel;

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

Route::get('/appia', [AppiaController::class, 'index'])->name('appia');
Route::get('/appia/{travel}', [AppiaController::class, 'show'])->name('appia.show');

Route::middleware(['auth', 'verified'])
    ->name('admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('travels', TravelController::class);
    });







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
