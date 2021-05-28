<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get/user', 'Api\ApiMasterController@get_user')->name('api.get.user');
Route::post('/get/invoice', 'Api\ApiMasterController@get_invoice')->name('api.get.invoice');
Route::get('/user/credit-limit', 'Api\ApiCreditScoringController@limit_credit')->name('api.get.user');
Route::post('/pcg/registration', 'Api\ApiPCGController@auto_register')->name('api.pcg.register');
Route::post('/pcg/invoice/check', 'Api\ApiPCGController@check_pcg_invoice_number')->name('api.pcg.register');
Route::post('/pcg/invoice/check/interest', 'Api\ApiPCGController@check_pcg_interest_invoice_number')->name('api.pcg.register');
Route::post('/pcg/invoice/responce/dummi', 'Api\ApiPCGController@get_data_from_invoice')->name('api.pcg.response');


Route::middleware(['cors'])->group(function () {
    Route::get('/borrower/credit/scoring', 'Api\ApiCreditScoringController@check_my_credit_score')->name('borrower.credit.scoring');
});

Route::post('/sms/otp', 'Api\FcmController@limit_credit')->name('api.pcg.response');
Route::post('/ekyc/callback', 'Api\UsersEKYCController@index')->name('user.ekyc.calback');
Route::post('/ekyc/callback/activation', 'Api\UsersEKYCController@callback_activation')->name('user.ekyc.calback');
//Route::post('/ekyc/post', 'Api\UsersEKYCController@requestRegistration')->name('user.ekyc.calback');
Route::post('/ekyc/post', 'Api\UsersEKYCController@requestRegistration')->name('user.ekyc.calback');
Route::post('/ekycres', 'Api\UsersEKYCController@uploadDocumentest')->name('user.ekyc.calback');

Route::get('/sign/callback', 'Api\Digisign@sign_callback')->name('user.digisign.calback');
Route::get('/activation/callback', 'Api\Digisign@activation_callback')->name('user.digisign.calback');


