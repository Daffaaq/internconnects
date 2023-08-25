<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CuricullumVitaeController;
use App\Http\Controllers\ProposalsController;
use App\Http\Controllers\EducationController;
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
        Route::get('/cv/{cv}/edit', [CuricullumVitaeController::class, 'edit'])->name('admin.cv.edit');
        Route::put('/cv/{cv}', [CuricullumVitaeController::class, 'update'])->name('admin.cv.update');
        Route::delete('/cv/{cv}', [CuricullumVitaeController::class, 'destroy'])->name('admin.cv.destroy');
        // Route::resource('admin/cv', CuricullumVitaeController::class)->except(['show']);
    });
    Route::prefix('admin')->group(function () {
        Route::get('/proposals', [ProposalsController::class, 'index'])->name('admin.proposals');
        Route::get('/proposals/create', [ProposalsController::class, 'create'])->name('admin.proposals.create');
        Route::post('/proposals', [ProposalsController::class, 'store'])->name('admin.proposals.store');
        Route::get('/proposals/{proposals}/edit', [ProposalsController::class, 'edit'])->name('admin.proposals.edit');
        Route::put('/proposals/{proposals}', [ProposalsController::class, 'update'])->name('admin.proposals.update');
        Route::delete('/proposals/{proposal}', [ProposalsController::class, 'destroy'])->name('admin.proposals.destroy');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/education', [EducationController::class, 'index'])->name('admin.education');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/superadmin', [AdminController::class, 'index'])->name('admin.superadmin');
    });
});

