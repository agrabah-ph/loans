<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Borrower\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your a\pplication. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*socialite*/
Route::get('oauth/{driver}', 'SocialiteController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'SocialiteController@handleProviderCallback')->name('social.callback');


Route::get('/', function () {
    return redirect('/login');
});

Route::resource('/try', 'TryController');
require __DIR__.'/auth.php';

Route::get('/logout', function() {
    \Illuminate\Support\Facades\Auth::logout();
   return redirect('/login');
});

// REGISTRATION FORMS
Route::get('register-borrower','Borrower\\BorrowersController@register_borrower')->name('register_borrower');

Route::group(['middlewareGroups' => ['auth', 'verified', 'role:borrower']], function() {
    Route::prefix('')->name('borrower.')->group(function() {
        // BORROWER ROUTES
    });
});

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::prefix('')->name('loan_provider.')->group(function() {
        Route::get('dashboard', 'LoanProvider\\DashboardController@index')->name('dashboard');
        Route::get('account_setup', 'LoanProvider\\LoanProvidersController@account_setup')->name('account_setup');
        Route::get('profile', 'LoanProvider\\BankProfileController@index')->name('profile');

        Route::resource('loan_provider', 'LoanProvider\\LoanProvidersController');
        Route::post('register_loan_provider', 'LoanProvider\\LoanProvidersController@register_loan_provider')->name('register_loan_provider');
    });
});