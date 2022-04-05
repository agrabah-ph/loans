<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
//test

// GLOBAL ROUTES START
Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', 'Controller@registration');

Route::get('qr-reader', 'PublicController@qrReader')->name('qr-reader');
Route::get('sms-test', 'PublicController@smsTest')->name('sms-test');
Route::get('test', 'PublicController@test')->name('test');
Route::get('export', 'PublicController@export')->name('export');


//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('logout', 'UserController@logout')->name('logout');

Route::middleware(['auth', 'verified', 'has_profile'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('activation', 'PublicController@activation')->name('activation');

    Route::resource('farmer', 'FarmerController');
    Route::resource('community-leader', 'CommunityLeaderController');
    Route::resource('loan-provider', 'LoanProviderController');

    Route::resource('profile', 'ProfileController');
    Route::get('my-profile', 'ProfileController@myProfile')->name('my-profile');
    Route::get('select-profile', 'ProfileController@selectProfile')->name('select-profile');
    Route::get('get-my-profile', 'ProfileController@getMyProfile')->name('get-my-profile');

    Route::resource('product', 'ProductController');
    Route::get('product-list', 'ProductController@productList')->name('product-list');
    Route::get('product-unit-list', 'ProductController@productUnitList')->name('product-unit-list');
    Route::post('product-store', 'ProductController@productStore')->name('product-store');

    Route::resource('user', 'UserController');
    Route::get('user-list', 'UserController@userList')->name('user-list');
    Route::get('personnel-info', 'UserController@personnelInfo')->name('personnel-info');
    Route::post('create-user', 'UserController@createUser')->name('create-user');

    Route::get('role', 'RoleController@index')->name('role');
    Route::get('role-show/{id}', 'RoleController@show')->name('role-show');
    Route::post('role-update/{id}', 'RoleController@update')->name('role-update');
    Route::post('add-role', 'RoleController@addRole')->name('add-role');

    Route::post('save_registrant', 'RoleController@saveRegistrant')->name('save-registrant');

    Route::resource('settings', 'SettingController');

    Route::get('trace-report', 'ReportController@traceReport')->name('trace-report');
    Route::get('trace-table-report', 'ReportController@traceTableReport')->name('trace-table-report');

    Route::post('print-report', 'ReportController@printReport')->name('print-report');
    Route::post('print-report-data', 'ReportController@printReportData')->name('print-report-data');

    Route::get('loan/proof/{id}/{filename}', 'LoanController@proofPhoto')->name('loan-proof');
    Route::get('loan/applicants', 'LoanProviderController@loanApplicant')->name('loan-applicant');


});
// GLOBAL ROUTES END


Route::get('loan-registration', 'PublicController@loanRegistration')->name('loan-registration');
Route::post('loan-user-registration-store', 'PublicController@loanUserRegistrationStore')->name('loan-user-registration-store');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('loan-provider/profile/create', 'PublicController@loneProviderProfileCreate')->name('loan-provider-profile-create');
    Route::post('loan-provider/profile/store', 'LoanProviderController@profileStore')->name('loan-provider-profile-store');

    Route::get('farmer/profile/create', 'PublicController@farmerProfileCreate')->name('farmer-profile-create');
    Route::post('farmer/profile/store', 'FarmerController@profileStore')->name('farmer-profile-store');


    Route::post('user-profile-store', 'ProfileController@profileStore')->name('user-profile-store');

});

Route::middleware(['auth', 'verified', 'has_profile'])->group(function () {

    Route::get('loan-provider-dashboard', 'HomeController@loanProviderDashboard')->name('loan-provider-dashboard');
    Route::get('verify-disbursement', 'LoanController@verifyDisbursement')->name('verify-disbursement');

    Route::resource('products', 'LoanProductController');

//        Route::get('loan/product/show', 'FarmerController@loanProductShow')->name('loan-product-show');
    Route::get('loan/product/list', 'FarmerController@loanProductList')->name('loan-product-list');
    Route::get('loan-product-list-get', 'FarmerController@loanProductListGet')->name('loan-product-list-get');
    Route::get('loan-apply', 'FarmerController@loanApply')->name('loan-apply');
    Route::post('loan-submit-form', 'FarmerController@submitLoanApplication')->name('loan-submit-form');

    Route::get('my-loans/', 'LoanController@index')->name('my-loans');
    Route::post('verify-loan', 'LoanController@verify')->name('verify-loan');
    Route::get('generateSchedule', 'LoanController@getPaymentSchedule')->name('generate-schedule');

//        Route::get('loan/applicants', 'LoanProviderController@loanApplicant')->name('loan-applicant');
    Route::get('loan-update-status', 'LoanProviderController@loanUpdateStatus')->name('loan-update-status');

    Route::get('custom-forms', 'LoanProviderController@customForms')->name('custom-forms');

    Route::get('check-disbursement', 'LoanDisbursementController@getList')->name('check-disbursement');
    Route::post('store-disbursement', 'LoanDisbursementController@storeDisbursement')->name('store-disbursement');


    Route::get('reports/loan', 'ReportController@loanReportIndex')->name('loan-report');
    Route::get('get-loan-report', 'ReportController@loanReportList')->name('get-loan-report');

    Route::get('get-loan-info', 'ReportController@getLoanInfo')->name('get-loan-info');
    Route::get('loan/info/{id}', 'ReportController@loanInfo')->name('loan-info');

});






