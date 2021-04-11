<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\borrower\HomeController;
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
    return redirect('/login');
});


Route::resource('/try', 'TryController');

Route::get('register-borrower','Borrower\\BorrowersController@register_borrower')->name('register_borrower');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

