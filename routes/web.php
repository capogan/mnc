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



//Borrower
Route::get('/borrower/personal/profile', 'BorrowerController@my_profile')->name('borrower.personal.profile');
Route::post('/borrower/submit/loan', 'BorrowerController@sumbit_loan')->name('submit.loan');
//Users
Route::post('/add/personal/info', 'UsersController@add_personal_info')->name('add.personal.info');
Route::post('/add/personal/business', 'UsersController@add_personal_business')->name('add.personal.info');
Route::post('/upload/file', 'UsersController@upload_file')->name('upload.file.post');

//Route::get('/pendanaan/{level}', 'BorrowerController@my_profile')->name('borrower.personal.profile');
Route::get('register/{group_id}', 'Auth\RegisterController@showRegistrationForm');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});





