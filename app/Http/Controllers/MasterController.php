<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Regency;
use DB;
use Illuminate\Support\Facades\Auth;
use PDF;


class MasterController extends Controller
{
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
}
