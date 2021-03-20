<?php

use Illuminate\Support\Facades\Route;
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
    return view('home');
});


Auth::routes();


Route::get('/profile', 'BorrowerController@my_profile')->name('borrower.personal.profile');
Route::get('/register/business', 'BorrowerController@my_profile_business')->name('borrower.personal.profile');
Route::get('/register/file', 'BorrowerController@my_profile_file')->name('borrower.personal.profile');
Route::get('/register/faktur', 'BorrowerController@my_profile_faktur')->name('borrower.personal.profile');
Route::get('/register/transaction', 'BorrowerController@my_profile_transaction')->name('borrower.personal.profile');

Route::post('/borrower/submit/loan', 'BorrowerController@sumbit_loan')->name('submit.loan');
//Users
Route::post('/add/personal/info', 'UsersController@add_personal_info')->name('add.personal.info');
Route::post('/add/personal/business', 'UsersController@add_personal_business')->name('add.personal.info');
Route::post('/upload/file', 'UsersController@upload_file')->name('upload.file.post');


Route::get('/otp/verified', 'UsersController@otp_verified')->name('borrower.otp.verified');
Route::post('/user/verified/otp', 'UsersController@validate_otp')->name('borrower.otp.validate');
Route::post('/user/send/otp', 'UsersController@send_otp_again')->name('borrower.otp.send');

//Route::get('/register', function(){
//    return redirect('/');
//});
//Route::get('register/{group}', 'Auth\RegisterController@showRegistrationForm');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/test', 'UsersController@test');
//Master
Route::get('/get/city','MasterController@get_city')->name('city');
Route::get('/get/district','MasterController@get_district')->name('district');
Route::get('/get/villages','MasterController@get_villages')->name('get_villages');






