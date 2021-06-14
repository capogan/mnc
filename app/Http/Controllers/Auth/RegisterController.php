<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\Utils;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'term' => ['required'],
            'permission' => ['required'],
            'level' => ['required'],
            'phone_number' => ['required' , 'min:11']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Utils::request_otp($data['phone_number']);
        return User::create([
            'name' => $data['name'],
            'phone_number_verified' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'group' => $data['group'],
            'level' => $data['level'],
        ]);

    }

    protected  function showRegistrationForm(Request $request){
        abort(404,'Page not found');
    }


    protected  function showRegistrationFormLender(Request $request){
        $group = 'lender';
        return view('auth.register_lender',compact('group'));
    }
    protected  function showRegistrationFormBorrower(Request $request){
        $group = 'borrower';
        $level = 'individu';
        return view('auth.register_borrower',compact('group','level'));
    }

}
