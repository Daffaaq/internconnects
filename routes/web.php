<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CuricullumVitaeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LandingPageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('admin')->group(function () {
        Route::get('/cv', [CuricullumVitaeController::class, 'index'])->name('admin.cv');
        Route::get('/cv/create', [CuricullumVitaeController::class, 'create'])->name('admin.cv.create');
        Route::post('/cv', [CuricullumVitaeController::class, 'store'])->name('admin.cv.store');
        // Route::resource('admin/cv', CuricullumVitaeController::class)->except(['show']);
    });
    Route::prefix('admin')->group(function () {
        Route::get('/superadmin', [AdminController::class, 'index'])->name('admin.superadmin');
    });
});

