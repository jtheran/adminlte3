<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileController;
use App\Mail\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    Route::get('/barcodes/create', function () {
        return view('barcode-create');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/mail', function () {
        return view('mail');
    });

    Route::resource('children', ChildrenController::class)->names('children');
    Route::resource('user', UserController::class)->names('user');
    Route::resource('parent', ParentController::class)->names('parent');
    Route::resource('event', EventController::class)->names('event');
    Route::resource('file', FileController::class)->names('file');
    Route::resource('mail', EmailController::class)->names('mail');


});

