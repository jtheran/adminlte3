<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('/barcodes', function () {
        return view('barcode');
    });

    Route::get('/barcodes/create', function () {
        return view('barcode-create');
    });

    Route::get('profile', function () {
        return view('profile');
    });

});

