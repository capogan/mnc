<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CreditScoreCategories;
use App\CreditScore;
use App\Helpers\HelpCreditScoring;
use function GuzzleHttp\json_encode;
use App\ScoreDecision;
use App\Http\Controllers\Api\ApiController;

class ApiCreditScoringController extends ApiController
{
    public function limit_credit(Request $request){
        //$data = ['usia' => 12 , 'income'=> 3000000 , 'education' => 'SMA' ,'established'=> '2' , 'pcg_transaction' => 3000000];
        $data = '{
            "usia": 22,
            "income": 3000000,
            "education": 3,
            "established": "4",
            "pcg_transaction": 3000000,
            "profit_per_month": "50.000.001 - 100.000.000",
            "business_legal": "Usaha Dagang",
            "income_per_month": "10.000.001 - 30.000.000",
            "business_placa_status": "Milik Pribadi",
            "established_business": ">= 5 tahun",
            "pcg_transaction" : "Rp. 30.000.001-50.000.000",
            "location": "Diluar Jabodetek"
          }';

        $approval = HelpCreditScoring::approval_decision($data);
        if(!$approval){
            
        }
        $scoring = HelpCreditScoring::credit_limit($data);
        $credit_limit = ScoreDecision::where(function ($query) use ($scoring) {
            $query->where('s_d_score_min', '<=', $scoring);
            $query->where('s_d_score_max', '>=', $scoring);
        })->first();
        
        if($credit_limit){
            $response = [
                'message' => 'Selamat, Kredit Limit kamu di aplikasi siap ',
                'limit' => $credit_limit->s_d_limit_credit
            ];
            return $this->successResponse($response);
        }
        return $this->errorResponse(static::ERROR_OUT_OF_STOCK, static::OUT_OF_STOCK);
    }
    
}
