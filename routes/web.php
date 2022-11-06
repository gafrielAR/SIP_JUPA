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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(FinalProjectController::class)->prefix('final-project')->name('FinalProject.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{data}', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{data}', 'edit')->name('edit');
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{data}', 'update')->name('update');
    Route::post('/delete/{data}', 'delete')->name('delete');
});
