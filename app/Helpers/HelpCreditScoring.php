<?php
namespace App\Helpers;

use function GuzzleHttp\json_encode;
use App\CreditScore;

class HelpCreditScoring {
    protected const DEF_ENC_KEY = "MODOCFIRSTMOBILCOMMUNITYINTHEWORLD";
    protected const DECISION_APPROVAL = [
        'usia' => [
                'type' => 'range' , 'component' => ['min' => 21 , 'max' => 50]
        ],
        'income' => [
                'type'=> 'belowcompare' , 'component' => ['min' => 999999]
        ],
        'education' => [
                'type'=> 'belowcompare' , 'component' => ['min' => 3]
        ],
        'established' => [
                'type'=> 'belowcompare' , 'component' => ['min' => 3]
        ],
        'pcg_transaction' => [            
                'type'=> 'belowcompare' , 'component' => ['min' => 3000000]
        ]
    ];

    public static function approval_decision($data){
        $data = json_decode($data , TRUE);
        foreach(self::DECISION_APPROVAL as $key => $value){
            if(array_key_exists($key , $data)){
                //$result = false;
                switch ($value['type']) {
                    case 'range':
                        $result = self::check_range_type($value['component']['min'] , $value['component']['max'] , $data[$key]);                      
                        break;
                    case 'belowcompare':
                        $result = self::check_belowcompare_type($value['component']['min'] , $data[$key]);                      
                        break;
                    default:
                      $result = false;
                  }
                    if(!$result){
                        return ['status' => 'false' , 'message' => 'Tidak dapat diberikan pinjaman karena '.$key.' Tidak memenuhi syarat'];
                    }
            }else{
                 return ['status' => 'false' , 'message' => 'data tidak lengkap! , Silahkan Lengkapi Data'];
            }
            
        }
        return ['status' => 'true' , 'message' => 'data lengkap data sesuai prosedur'];
    }

    public static function check_range_type($min , $max , $value){
        if($value >= $min && $value <= $max){
            return true;
        }
        return false;
    }
    public static function check_belowcompare_type($min , $value){
        if($value >= $min){
            return true;
        }
        return false;
    }

    public static function credit_limit($data){
        $data = json_decode($data , TRUE);
        $score_entity = CreditScore::select('name_score','id_category_score','category_score.code' ,'score')
                        ->leftJoin('category_score' ,'category_score.id','=','credit_score.id_category_score')
                        ->orderBy('id_category_score' , 'DESC')->get();
        $score = 0;
        foreach($score_entity as $value){
            if(array_key_exists($value->code , $data)){
                if($data[$value->code] == $value->name_score){
                    $score +=  $value->score;
                    //echo $value->code.''.$value->score.''.$data[$value->code].'<br>';
                }
            }
        }
        return $score;
    }


    public static function decrypt($base64_text, $hex = false) {
        if ($hex) {
            $base64_text = hex2bin(strtolower($base64_text));
        }
        return openssl_decrypt(base64_decode($base64_text), 'aes-256-cbc', static::DEF_ENC_KEY, true, str_repeat(chr(0), 16));
    }

    public static function encrypt($plain_text, $hex = false) {
        $enc = base64_encode(openssl_encrypt($plain_text, 'aes-256-cbc', static::DEF_ENC_KEY, true, str_repeat(chr(0), 16)));
        if ($hex) {
            $enc = strtolower(bin2hex($enc));
        }
        return $enc;
    }

    public static function upload_image($storage_path, $file,$filename){

        $bucket = Storage::disk('s3')->put('modoc/'.$storage_path.'' . $filename, file_get_contents($file));

        if($bucket){
            return 'https://'. env('AWS_BUCKET') .'.s3-'. env('AWS_DEFAULT_REGION').'.'.env('AWS_URI').'/ebagi'.$storage_path.$filename;
        }else{
            return false;
        }
    }

    public static function upload_local_image($image){
       // $image = str_replace('data:image/png;base64,', '', $base64);
        $path = public_path().'/question/';
        $image = str_replace(' ', '+', $image);
        $imageName = md5(rand(11111, 99999)) . '_' . time() . '.jpg';
        $path = $path . $imageName;
        $input = \File::put($path, base64_decode($image));
        $image = Image::make($path)->resize(50, 50);
        $result = $image->save($path);

        return $imageName;


        $image = str_replace(' ', '+', $image);
        $image = base64_decode($image);
        $imageName = uniqid().'.'.'png';
        //\File::put(storage_path(). '/' . $imageName, $image);

        //$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/thumbnail');
        $img = Image::make($image,array(
            'width' => 100,
            'height' => 100,
            'grayscale' => false
        ));
        $img->save($destinationPath.'/'.$image);
        $destinationPath = public_path('images');
        $image->move($destinationPath, $input['imagename']);
    }

    public static function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'minute'),
            array(1 , 'second')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return "{$print} ago";
    }

    public static function memo_status($status){
        $arr_status = [
            "normal" => "Normal",
            "info"=>"Info",
            "blocked3"=>"Blocked 3 Days",
            "blocked7"=>"Blocked 7 Days",
            "ban"=>"Banned",
            "reset"=>"Reset Pin"
        ];

        return $arr_status[$status];
    }

    
    public static function set_cache($key, $value, $expired = null){
        if(!$expired){
            Cache::forever($key,$value);
        }else{
            Cache::put($key,$value);
        }
    }

    public static function get_cache($key){
        return Cache::get($key);
    }

    public static function sendEmail($email,$recipient_name,$body)
    {
        try{
            Mail::send([], [], function ($message) use ($body,$email) {
                $message->to($email)
                    ->subject('Notifikasi Ebagi')
                    ->from('noreplay@cashtree.id','Giftn')
                    ->setBody($body, 'text/html');
            });

        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
