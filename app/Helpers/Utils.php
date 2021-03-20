<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use ValueFirst;
use function GuzzleHttp\json_encode;

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


        $to ='9111111111'; // Phone number with country code where we want to send message(Required)
        $templateId = "123"; //Approved template ID by ValueFirst
        $data = []; // Array of data to replace template data with dynamic one
        $tag = 'Whatsapp Message';  //Tag if you want to assign (Optional)



        // Without passing tag
        $response=ValueFirst::sendTemplateMessage($to,$templateId,$data);

        // With passing tag
        $response=ValueFirst::sendTemplateMessage($to,$templateId,$data,$tag);

        $data = [
            'VER' => "1.2",
            'USER' => array('USERNAME' => 'DEMO21NEWXML' , 'PASSWORD' =>'test@2021' , 'UNIXTIMESTAMP' => md5(microtime())),
            'SMS' => [
                array(
                    'UDH' => '0',
                    'CODING' => "1",
                    'TEXT' => 'Test SMS',
                    'PROPERTY' => '0',
                    'ID' => '1',
                    'ADDRESS' => [
                        array(
                            'FROM' => 'Telkom109',
                            'TO' => '081260332838',
                            'SEQ' => '1',
                            'TAG' => 'TESTTING OTP'
                        )
                    ]
                )
            ]
        ];
        echo json_encode($data);
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
        print_r($result);
        if ($result === FALSE) {
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        return true;
    }
    

}
