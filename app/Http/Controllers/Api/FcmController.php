<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Helpers\Utils;

class FcmController extends ApiController
{
    public function limit_credit(Request $request){
        print_r(Utils::request_otp('081260332838'));
        exit;
    }
    
}
