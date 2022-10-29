<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\FinalProjectController;
use App\Http\Controllers\HomeController;

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

Route::get('/list', [FinalProjectController::class, 'list'])->name('show');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/', [FinalProjectController::class, 'list'])->name('welcome');
//     Route::get('/list', [FinalProjectController::class, 'list'])->name('list');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
