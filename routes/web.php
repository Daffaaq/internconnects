<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\CuricullumVitaeController;
use App\Http\Controllers\ProposalsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CategoryInternsController;
use App\Http\Controllers\IntenshipTempsController;
use App\Http\Controllers\IntenshipController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
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
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
// Menampilkan form untuk input data
Route::get('/guest/form', [GuestController::class, 'form'])->name('guest.form');

// Menyimpan data dari form ke dalam database
Route::post('/guest/store', [GuestController::class, 'store'])->name('guest.store');

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
        Route::get('/education/create', [EducationController::class, 'create'])->name('admin.education.create');
        Route::post('/education', [EducationController::class, 'store'])->name('admin.education.store');
        Route::get('/admin/education/{education}/edit', [EducationController::class, 'edit'])->name('admin.education.edit');
        Route::put('/admin/education/{education}', [EducationController::class, 'update'])->name('admin.education.update');
        Route::delete('/admin/education/{education}', [EducationController::class, 'destroy'])->name('admin.education.destroy');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/students', [StudentsController::class, 'index'])->name('admin.students');
        Route::post('/students', [StudentsController::class, 'store'])->name('admin.students.store');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/categoryintern', [CategoryInternsController::class, 'index'])->name('admin.categoryintern');
        Route::post('/categoryintern', [CategoryInternsController::class, 'store'])->name('admin.categoryintern.store');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/interntemp', [IntenshipTempsController::class, 'index'])->name('admin.interntemp');
        Route::post('/interntemp', [IntenshipTempsController::class, 'store'])->name('admin.interntemp.store');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/datafinal', [IntenshipController::class, 'index'])->name('admin.datafinal');
        Route::post('/datafinal', [IntenshipController::class, 'store'])->name('admin.datafinal.store');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/superadmin', [AdminController::class, 'index'])->name('admin.superadmin');
    });
});

