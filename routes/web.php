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

Route::get('/lender', function () {
    return view('index_lender');
});

Route::get('/tentang-kami', function () {
    return view('tentang_kami');
});

Route::get('/kegiatan', function () {
    return view('kegiatan');
});

Route::get('/pinjam', function () {
    return view('pinjam');
});
Route::get('/faq', function () {
    return view('faq');
});

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('register/lender', 'Auth\RegisterController@showRegistrationFormLender');
Route::get('register/borrower', 'Auth\RegisterController@showRegistrationFormBorrower');
Route::get('email', 'HomeController@send_email');

//..............................................................................................................
//.................OOOOOO..................................OOOOOO...............................................
//.BBBBBBBBBB.....OOOOOOOOO...RRRRRRRRRR...RRRRRRRRRR.....OOOOOOOOO..OWWW..WWWWW..WWWW.EEEEEEEEEEE.RRRRRRRRRR...
//.BBBBBBBBBBB...OOOOOOOOOO...RRRRRRRRRRR..RRRRRRRRRRR...OOOOOOOOOO..OWWW..WWWWW..WWWW.EEEEEEEEEEE.RRRRRRRRRRR..
//.BBBBBBBBBBB..OOOOOOOOOOOO..RRRRRRRRRRR..RRRRRRRRRRR..OOOOOOOOOOOO.OWWW..WWWWW..WWWW.EEEEEEEEEEE.RRRRRRRRRRR..
//.BBBB...BBBB..OOOO....OOOO..RRRR...RRRRR.RRRR...RRRRR.OOOO....OOOO..WWWW.WWWWW.WWWW..EEEE........RRRR...RRRR..
//.BBBB..BBBBB..OOOO....OOOOO.RRRR...RRRRR.RRRR...RRRRR.OOOO....OOOOO.WWWWWWWWWWWWWWW..EEEEEEEEEE..RRRR...RRRR..
//.BBBBBBBBBBB.BOOO......OOOO.RRRRRRRRRRR..RRRRRRRRRRR.ROOO......OOOO.WWWWWWWWWWWWWWW..EEEEEEEEEE..RRRRRRRRRRR..
//.BBBBBBBBBBB.BOOO......OOOO.RRRRRRRRRRR..RRRRRRRRRRR.ROOO......OOOO.WWWWWWWWWWWWWWW..EEEEEEEEEE..RRRRRRRRRRR..
//.BBBBBBBBBBB.BOOO......OOOO.RRRRRRRRRRR..RRRRRRRRRRR.ROOO......OOOO..WWWWWW.WWWWWW...EEEEEEEEEE..RRRRRRRRRRR..
//.BBBB....BBBB.OOOO....OOOOO.RRRR..RRRRR..RRRR..RRRRR..OOOO....OOOOO..WWWWWW.WWWWWW...EEEE........RRRR..RRRRR..
//.BBBB...BBBBB.OOOO....OOOO..RRRR...RRRR..RRRR...RRRR..OOOO....OOOO...WWWWWW.WWWWWW...EEEE........RRRR...RRRR..
//.BBBBBBBBBBB..OOOOOOOOOOOO..RRRR...RRRR..RRRR...RRRR..OOOOOOOOOOOO....WWWWW.WWWWW....EEEEEEEEEEE.RRRR...RRRR..
//.BBBBBBBBBBB...OOOOOOOOOO...RRRR...RRRR..RRRR...RRRR...OOOOOOOOOO.....WWWW...WWWW....EEEEEEEEEEE.RRRR...RRRR..
//.BBBBBBBBBB.....OOOOOOOOO...RRRR...RRRRR.RRRR...RRRRR...OOOOOOOOO.....WWWW...WWWW....EEEEEEEEEEE.RRRR...RRRR..
//.................OOOOOO..................................OOOOOO...............................................
//..............................................................................................................
Route::get('/profile', 'BorrowerController@my_profile')->name('borrower.personal.profile');
Route::get('/profile/business', 'BorrowerController@my_profile_business')->name('borrower.personal.profile');
Route::get('/profile/file', 'BorrowerController@my_profile_file')->name('borrower.personal.profile');
Route::get('/profile/faktur', 'BorrowerController@my_profile_faktur')->name('borrower.personal.profile');
Route::get('/profile/transaction', 'BorrowerController@my_profile_transaction')->name('borrower.personal.profile');
Route::post('/borrower/submit/loan', 'BorrowerController@sumbit_loan')->name('submit.loan');
Route::get('/profile/sign/{invoice}', 'BorrowerController@sign')->name('personal.sign');
Route::post('/borrower/document/sign', 'BorrowerController@get_document_to_sign')->name('personal.sign.document');

Route::get('/profile/congratulation/{invoice}', 'BorrowerController@congratulation')->name('personal.congratulation');
Route::post('/profile/received', 'BorrowerController@confirm')->name('personal.congratulation');
Route::get('/profile/loan/installment/{invoice}', 'BorrowerController@congratulation')->name('personal.congratulation');
Route::get('/profile/loan/detail/{invoice}', 'BorrowerController@loan_installments')->name('loan.detail');

Route::get('/repayment', 'BorrowerController@repayment')->name('repayment.detail');
Route::post('/repayment/request', 'BorrowerController@repayment_request')->name('repayment.request');
//................................................................
//................SSSSSS...............................SSSSSS.....
//.UUUU...UUUU...SSSSSSSS...SEEEEEEEEEE.ERRRRRRRRR....SSSSSSSS....
//.UUUU...UUUU..SSSSSSSSSS..SEEEEEEEEEE.ERRRRRRRRRR..RSSSSSSSSS...
//.UUUU...UUUU..SSSSSSSSSS..SEEEEEEEEEE.ERRRRRRRRRR..RSSSSSSSSS...
//.UUUU...UUUU.USSS...SSSSS.SEEE........ERRR...RRRRRRRSS...SSSSS..
//.UUUU...UUUU.USSSSS.......SEEEEEEEEE..ERRR...RRRRRRRSSSS........
//.UUUU...UUUU..SSSSSSSSS...SEEEEEEEEE..ERRRRRRRRRR..RSSSSSSSS....
//.UUUU...UUUU..SSSSSSSSSS..SEEEEEEEEE..ERRRRRRRRRR..RSSSSSSSSS...
//.UUUU...UUUU....SSSSSSSSS.SEEEEEEEEE..ERRRRRRRRRR....SSSSSSSSS..
//.UUUU...UUUU.USSS..SSSSSS.SEEE........ERRR..RRRRR.RRSS..SSSSSS..
//.UUUU...UUUU.USSS....SSSS.SEEE........ERRR...RRRR.RRSS....SSSS..
//.UUUUUUUUUUU.USSSSSSSSSSS.SEEEEEEEEEE.ERRR...RRRR.RRSSSSSSSSSS..
//.UUUUUUUUUUU..SSSSSSSSSS..SEEEEEEEEEE.ERRR...RRRR..RSSSSSSSSS...
//..UUUUUUUUU....SSSSSSSSS..SEEEEEEEEEE.ERRR...RRRRR..SSSSSSSSS...
//....UUUUU.......SSSSSS...............................SSSSSS.....
//................................................................
Route::post('/add/personal/info', 'UsersController@add_personal_info')->name('add.personal.info');
Route::post('/add/personal/business', 'UsersController@add_personal_business')->name('add.personal.info');
Route::post('/upload/file', 'UsersController@upload_file')->name('upload.file.post');
Route::get('/otp/verified', 'UsersController@otp_verified')->name('borrower.otp.verified')->middleware(['verified']);
Route::post('/user/verified/otp', 'UsersController@validate_otp')->name('borrower.otp.validate');
Route::post('/user/send/otp', 'UsersController@send_otp_again')->name('borrower.otp.send');

//............................................................................
//.LLLL.......EEEEEEEEEEE.ENNN....NNN..DDDDDDDDD....EEEEEEEEEEE.ERRRRRRRRR....
//.LLLL.......EEEEEEEEEEE.ENNNN...NNN..DDDDDDDDDDD..EEEEEEEEEEE.ERRRRRRRRRR...
//.LLLL.......EEEEEEEEEEE.ENNNN...NNN..DDDDDDDDDDD..EEEEEEEEEEE.ERRRRRRRRRR...
//.LLLL.......EEEE........ENNNNN..NNN..DDDD...DDDDD.EEEE........ERRR...RRRRR..
//.LLLL.......EEEEEEEEEE..ENNNNNN.NNN..DDDD....DDDD.EEEEEEEEEE..ERRR...RRRRR..
//.LLLL.......EEEEEEEEEE..ENNNNNN.NNN..DDDD....DDDD.EEEEEEEEEE..ERRRRRRRRRR...
//.LLLL.......EEEEEEEEEE..ENN.NNNNNNN..DDDD....DDDD.EEEEEEEEEE..ERRRRRRRRRR...
//.LLLL.......EEEEEEEEEE..ENN.NNNNNNN..DDDD....DDDD.EEEEEEEEEE..ERRRRRRRRRR...
//.LLLL.......EEEE........ENN..NNNNNN..DDDD...DDDDD.EEEE........ERRR..RRRRR...
//.LLLL.......EEEE........ENN..NNNNNN..DDDD...DDDD..EEEE........ERRR...RRRR...
//.LLLLLLLLLL.EEEEEEEEEEE.ENN...NNNNN..DDDDDDDDDDD..EEEEEEEEEEE.ERRR...RRRR...
//.LLLLLLLLLL.EEEEEEEEEEE.ENN...NNNNN..DDDDDDDDDD...EEEEEEEEEEE.ERRR...RRRR...
//.LLLLLLLLLL.EEEEEEEEEEE.ENN....NNNN..DDDDDDDDD....EEEEEEEEEEE.ERRR...RRRRR..
//............................................................................

Route::get('/profile/lender', 'LenderController@index')->name('profile.lender');


Route::get('/profile/lender/information/director', 'LenderController@director')->name('profile.lender.information.director');
Route::get('/profile/lender/information/commissioner', 'LenderController@commissioner')->name('profile.lender.information.commissioner');
Route::get('/profile/lender/information/file', 'LenderController@information_file')->name('profile.lender.information.file');



Route::post('/lender/business/add', 'LenderController@information_business_add')->name('lender.register.business.add');
Route::get('/lender/funding', 'LenderController@market_place')->name('profile.lender.information.market.place');
Route::post('/lender/register/director', 'LenderController@submit_director_data')->name('profile.lender.information.market.place');
Route::get('/lender/profiles', 'LenderController@profile')->name('profile.lender.information');
Route::get('/profile/rdl', 'LenderController@rdl_account')->name('profile.lender.rdl.account');

Route::post('/lender/register/commisioner', 'LenderController@submit_commisioner_data')->name('profile.lender.commisioner');
Route::post('/lender/submit/attachment/', 'LenderController@submit_attachment_data')->name('profile.lender.attachment');

Route::get('/profile/lender/register/sign', 'LenderController@register_sign_aggrement')->name('profile.lender.attachment');

Route::post('/lender/register/dosign', 'LenderController@upload_document_aggreement')->name('profile.lender.attachment');
Route::get('/document/privy', 'LenderController@priview_document')->name('profile.lender.attachment');

Route::post('/lender/register/agreement', 'LenderController@update_status_sign')->name('profile.lender.sign');
Route::post('/request/to_fund/loan', 'LenderController@submit_request_loan')->name('profile.lender.sign');
Route::get('/marketplace', 'LenderController@marketplace_agreement')->name('profile.lender.sign');
Route::get('/portofolio', 'LenderController@portofolio')->name('profile.lender.sign');
Route::get('/portofolio/detail', 'LenderController@portofolio_detail')->name('profile.lender.sign');
Route::post('/sign_document_fund_aggreement' , 'LenderController@lender_sign_document_fund_aggreement')->name('lender.sign.aggrement.fund');
Route::get('/sign/success' , 'LenderController@sign_success')->name('lender.sign.aggrement.success');

// RDL ACCOUNT
Route::get('/lender/rdl/account/registered' , 'LenderController@register_rdl_account')->name('lender.sign.aggrement.success');
Route::POST('/lender/update/rdl_account' , 'LenderController@update_rdl_account')->name('lender.update.rdl.account');

// END RDL ACCOUNT

Route::get('/profile/lender-individu', 'LenderIndividualController@index')->name('profile.lender.individu');
Route::post('/profile/lender-individu', 'LenderIndividualController@post_profile')->name('profile.lender.individu.submit');
Route::get('/profile/lender-individu/occupation', 'LenderIndividualController@get_occupation')->name('profile.lender.individu.occupation');
Route::post('/profile/lender-individu/occupation', 'LenderIndividualController@post_occupation')->name('profile.lender.individu.occupation.submit');
Route::get('/profile/lender-individu/occupation/sme', 'LenderIndividualController@get_occupation_sme')->name('profile.lender.individu.occupation.sme');
Route::post('/profile/lender-individu/occupation/sme', 'LenderIndividualController@post_occupation_sme')->name('profile.lender.individu.occupation.submit.sme');
Route::get('/profile/lender-individu/document', 'LenderIndividualController@get_document')->name('profile.lender.individu.document');
Route::get('/profile/lender-individu/document/sme', 'LenderIndividualController@get_document_sme')->name('profile.lender.individu.document.sme');
Route::post('/profile/lender-individu/document', 'LenderIndividualController@post_document')->name('profile.lender.individu.document.submit');
Route::post('/profile/lender-individu/document/sme', 'LenderIndividualController@post_document_sme')->name('profile.lender.individu.document.submit.sme');


Route::post('/profile/lender-individu/activate_account', 'LenderIndividualController@activation_account_digisign')->name('profile.lender.individu.activate.account');

Route::post('/account/activate_account', 'LenderIndividualController@activation_account_digisign')->name('profile.lender.individu.activate.account');

Route::get('/digisigngetdocument', 'LenderController@get_document_to_assign')->name('lender.document.get');


Route::get('/profile/lender-individu/sign', 'LenderIndividualController@get_sign')->name('profile.lender.individu.sign');
Route::post('/profile/lender-individu/sign', 'LenderIndividualController@post_sign')->name('profile.lender.individu.sign.submit');
Route::get('/sign/document', 'DocumentController@document')->name('document.asign.agreement');

Route::post('/profile/lender/sign', 'LenderController@post_sign')->name('profile.lender.individu.sign.submit');

Route::get('/myprofile', 'LenderController@myprofile')->name('myprofile.lender');

//.............................................................................
//...............................SSSSSS........................................
//.MMMMM...MMMMM.....AAAAA......SSSSSSSS..STTTTTTTTTT.EEEEEEEEEEE.RRRRRRRRRR...
//.MMMMM...MMMMM.....AAAAA.....SSSSSSSSSS.STTTTTTTTTT.EEEEEEEEEEE.RRRRRRRRRRR..
//.MMMMMM..MMMMM....AAAAAAA....SSSSSSSSSS.STTTTTTTTTT.EEEEEEEEEEE.RRRRRRRRRRR..
//.MMMMMM.MMMMMM....AAAAAAA...ASSS...SSSSS....TTTT....EEEE........RRRR...RRRR..
//.MMMMMM.MMMMMM....AAAAAAA...ASSSSS..........TTTT....EEEEEEEEEE..RRRR...RRRR..
//.MMMMMM.MMMMMM...AAAAAAAAA...SSSSSSSSS......TTTT....EEEEEEEEEE..RRRRRRRRRRR..
//.MMMMMM.MMMMMM...AAAA.AAAA...SSSSSSSSSS.....TTTT....EEEEEEEEEE..RRRRRRRRRRR..
//.MMMMMMMMMMMMM...AAAAAAAAAA....SSSSSSSSS....TTTT....EEEEEEEEEE..RRRRRRRRRRR..
//.MMM.MMMMMMMMM..AAAAAAAAAAA.ASSS..SSSSSS....TTTT....EEEE........RRRR..RRRRR..
//.MMM.MMMMM.MMM..AAAAAAAAAAA.ASSS....SSSS....TTTT....EEEE........RRRR...RRRR..
//.MMM.MMMMM.MMM..AAAAAAAAAAAAASSSSSSSSSSS....TTTT....EEEEEEEEEEE.RRRR...RRRR..
//.MMM.MMMMM.MMM.MAAAA....AAAA.SSSSSSSSSS.....TTTT....EEEEEEEEEEE.RRRR...RRRR..
//.MMM.MMMMM.MMM.MAAA.....AAAA..SSSSSSSSS.....TTTT....EEEEEEEEEEE.RRRR...RRRR..
//...............................SSSSSS........................................
//.............................................................................
Route::get('/get/city','MasterController@get_city')->name('city');
Route::get('/get/district','MasterController@get_district')->name('district');
Route::get('/get/villages','MasterController@get_villages')->name('get_villages');
Route::get('laporan-pdf','MasterController@generatePDF');

Route::get('/digisign/request', 'LenderIndividualController@test_request_register_data');


Route::get('/lender/dashboard', 'LenderController@dashboard')->name('lender.dashboard');



Route::get('agreement/lender','LenderController@aggreement_lender');
Route::get('agreement/borrower','LenderController@aggreement_borrower');
Route::get('/send-email','MasterController@send_email');
