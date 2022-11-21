<?php

use Illuminate\Support\Facades\Route;

// Controller
// Guest
use App\Http\Controllers\HomeController;
// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FinalProjectController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\LecturerController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/final-projects', 'finalProject')->name('finalProject');
    Route::get('/student', 'student')->name('student');
    Route::get('/lecturer', 'lecturer')->name('lecturer');
    Route::get('/lab', 'lab')->name('lab');
});
Auth::routes();


Route::prefix('admin')->name('Admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');

    Route::prefix('final-project')->name('FinalProject.')->controller(FinalProjectController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{data}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{data}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{data}', 'update')->name('update');
        Route::post('/delete/{data}', 'delete')->name('delete');
    });

    Route::prefix('student')->name('Student.')->controller(StudentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{data}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{data}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{data}', 'update')->name('update');
        Route::post('/delete/{data}', 'delete')->name('delete');
    });

    Route::prefix('lecturer')->name('Lecturer.')->controller(LecturerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{data}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{data}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::post('/update/{data}', 'update')->name('update');
        Route::post('/delete/{data}', 'delete')->name('delete');
    });
});
