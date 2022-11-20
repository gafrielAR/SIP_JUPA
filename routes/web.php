<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\FinalProjectController;
use App\Http\Controllers\HomeController;

// Model
use App\Models\FinalProject;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/final-projects', [HomeController::class, 'finalProject'])->name('finalProject');
Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::get('/lecturer', [HomeController::class, 'lecturer'])->name('lecturer');
Route::get('/lab', [HomeController::class, 'lab'])->name('lab');

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::prefix('final-project')->name('FinalProject.')->controller(FinalProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{data}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{data}', 'edit')->name('edit');
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{data}', 'update')->name('update');
    Route::post('/delete/{data}', 'delete')->name('delete');
});
