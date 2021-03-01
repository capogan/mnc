<?php

namespace App\Http\Controllers;

use App\Education;
use App\MarriedStatus;
use App\Models\Province;
use App\Models\Regency;
use App\PersonalInfo;
use App\User;
use Illuminate\Http\Request;
use Auth;


class BorrowerController extends Controller
{
    static $CONFIG = [
        "title" => "Borrower",
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my_profile(Request $request){

        $uid = Auth::id();
        $get_user = PersonalInfo::where('uid',$uid)->first();
        $get_email = User::where('id',$uid)->first();
        $provinces = Province::get();
        $regency = Regency::get();
        $married_status = MarriedStatus::get();
        $education = Education::get();

        $data = [
            'provinces' => $provinces,
            'regency' => $regency,
            'married_status' => $married_status,
            'get_user' =>$get_user,
            'get_email' =>$get_email,
            'education' =>$education
        ];
        return view('pages.borrower.profile',$this->merge_response($data, static::$CONFIG));
    }




}
