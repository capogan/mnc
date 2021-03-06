<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Regency;
use DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class MasterController extends Controller
{
    static $CONFIG = [
        "title" => "Error",
    ];
    public function get_city(Request $request){

        $states = Regency::where("province_id",$request->province_id)
            ->pluck("name","id");
        return response()->json($states);

    }

    public function get_district(Request $request){

        $district = District::where("regency_id",$request->regency_id)
            ->pluck("name","id");
        return response()->json($district);

    }
    public function get_villages(Request $request){

        $vil = Village::where("district_id",$request->district_id)
            ->pluck("name","id");
        return response()->json($vil);

    }
    public function generatePDF()
    {
//        $id = Auth::id();
//        $data_loan =

        $data = [
            'title' => 'PERJANJIAN KREDIT',
            'date_request_loan' => '2021-04-12 17:00:00',
        ];

        $pdf = PDF::loadView('agreement.loan', $data);
        return $pdf->stream();
    }


    public function send_email(Request $request){

        $name = "Wildan Fuady";
        $email = "djersey18@gmail.com";
        $kirim = Mail::to($email)->send(new SendMail($name));

        if($kirim){
            echo "Email telah dikirim";
        }
    }

    public function error_page(){
        $invoice_number = session()->get( 'invoice_number' );
        $data = [
            'invoice_number' => $invoice_number,
        ];
//        return view('error');
        return view('error', $this->merge_response($data, static::$CONFIG));
    }


}
