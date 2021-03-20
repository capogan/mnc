<?php

namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Regency;
use DB;


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
}
