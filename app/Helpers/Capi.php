<?php
namespace App\Helpers;

class Capi {

    protected const PARTNER_SECRET = '';
    protected const PARTNER_SECRET_REQUEST = '';
    
    public static function connect_with_thirt_part_api($url,$data){
        $ch = curl_init();
        $data = http_build_query($data);
        $getUrl = $url."?".$data;
        echo $getUrl;
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        $response = curl_exec($ch);
        
        print_r($response);

        if(curl_error($ch)){
            curl_close($ch);
            return array('status'=>'error' , 'data'=>[]);
        }else {
            curl_close($ch);
            $data = json_decode($response);
            return array('status'=>'success' , 'data'=> $data);
        }

    }
}

