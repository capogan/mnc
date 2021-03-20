<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use SevenSpan\ValueFirst\Helpers\TemplateFormatter;
use function GuzzleHttp\json_encode;
use App\OtpLog;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\Psr7\str;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;

class Utils {
    public static function convert_status($status) {

        switch ($status) {
            case "0":
                return "Pending";
                break;
            case "1":
                return "Tahap Verifikasi";
                break;
            case "2":
                echo "Disetujui";
                break;
            case "3":
                echo "Sedang Berlangsung";
                break;
            case "4":
                echo "Ditolak";
                break;
            case "5":
                echo "Ditolak oleh PCG";
                break;
            default:
                echo "Tertunda";
        }
    }
    public static function calculate_age($dob,$option){
        if($option == 'years'){
            return Carbon::parse($dob)->diff(Carbon::now())->format('%y Tahun');
        }else if($option == 'month'){
            return Carbon::parse($dob)->diff(Carbon::now())->format('%y Tahu %m Bulan');
        }

    }
    public static function convert_currency($amount){
        $result = "Rp " . number_format($amount,2,',','.');
        return $result;

    }

    public static function convert_status_phone($status) {

        switch ($status) {
            case "1":
                return "Tidak Aktif";
                break;
            case "2":
                echo "Tidak ditempat";
                break;
            case "3":
                echo "Nomor Salah";
                break;
            case "4";
                echo "Tidak ditempat";
                break;
            case "5":
                echo "Tersambung";
                break;
            default:
                echo "Pemohon meminta reschedule telepon";
        }
    }

    public static function request_otp($phone_number){
        OtpLog::where('phone_number' , $phone_number)->update(['status' => false]);
        if(OtpLog::where('phone_number' , $phone_number)->count() > 5){
            return ['status' => false , 'message' => 'Terlalu banyak permintaan OTP, Silahkan coba beberapa saat lagi'];
        }
        $otp = mt_rand(100000,999999); 
        $data = [
            '@VER' => "1.2",
            'USER' => array('@USERNAME' => 'DEMO21NEWXML' , '@PASSWORD' =>'test@2021' , '@UNIXTIMESTAMP' => md5(microtime())),
            'SMS' => [
                array(
                    '@UDH' => '0',
                    '@CODING' => "1",
                    '@TEXT' => 'Hi, Kode OTP kamu untuk melengkapi proses registrasi Aplikasi SIAP adalah '.$otp.' ',
                    '@PROPERTY' => '0',
                    '@ID' => '1',
                    'ADDRESS' => [
                        array(
                            '@FROM' => 'Telkom109',
                            '@TO' => '62'.substr($phone_number, 1),
                            '@SEQ' => '1',
                            '@TAG' => 'TESTTING OTP'
                        )
                    ]
                )
            ]
        ];
        //$url = 'https://es.sonicurlprotection-tko.com/click?PV=1&MSGID=202103190427360089342&URLID=2&ESV=10.0.6.3447&IV=1BCE6495D2536F40B974CD45B50AC2F6&TT=1616128058161&ESN=1bhwtVUB4JyVU9nEsdDxkgf5c2gR%2BJXAeGzo0g3SIdc%3D&KV=1536961729279&ENCODED_URL=https%3A%2F%2Fapi.myvfirst.com%2Fpsms%2Fservlet%2Fpsms.JsonEservice&HK=E019308D0DF1B9F7860A4E1CB3B38CFA7675C87748FE39ED2ACA8DEBCEE7BC9E';
       $url = 'https://api.myvfirst.com/psms/servlet/psms.JsonEservice';
       $headers = array(
            'Content-Type:application/json',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        $response = json_decode($result , true);
        //if(array_key_exists('GUID' , $response['MESSAGEACK'])){
            OtpLog::create(
                [
                    'phone_number' => $phone_number,
                    'response' => $result,
                    'crated_at' => date('Y-m-d H:i:s'),
                    'otp' => $otp,
                ]
            );
            return ['status' => true , 'message' => 'sukses'];
        //}
        
    }

    public static function check_otp($phone , $otp){
        $otpLog = OtpLog::where('otp' , $otp)->where('status' , true)->where('phone_number' , $phone)->orderBy('id' , 'DESC')->first();
        if(!$otpLog){
            return ['status' => false , 'message' => 'Kode OTP tidak ditemukan']; 
        }
       //echo date('Y-m-d H:i:s') .' < '.date("Y-m-d H:i:s", (strtotime(date($otpLog->created_at)) + 30));
        if($otp == $otpLog->otp){
            if(strtotime(date('Y-m-d H:i:s'))  > strtotime(date("Y-m-d H:i:s", (strtotime(date($otpLog->created_at)) + 30)))){
                return ['status' => false , 'message' => 'Kode OTP sudah expired'];
            }
            User::where('phone_number_verified' , $phone)->update(['otp_verified' => true]);
           return ['status' => true , 'message' => 'Berhasil register'];
        }else{
            if($otpLog){
                return ['status' => false , 'message' => 'Kode OTP sudah expired'];
            }else{
                return ['status' => false , 'message' => 'Kode OTP tidak ditemukan'];                
            }
        }

    }

}
