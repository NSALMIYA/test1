<?php
namespace App\Helpers;
use App\Models\Setting;
use Twilio\Rest\Client;

class SmsHelper {

    

    public function sendSms(Request $request){

        $phone=$request->phone;
        $otp=$request->otp;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://www.smsstanch.in/API/sms.php?username=&password=&from=&to='.$phone.'&msg='.$otp.'%20is%20your%20One%20Time%20Password(OTP)%20for%20E-commerce%0A%0AThank%20you%0APrevia%20Health%20&type=1&dnd_check=0&template_id=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;

    }
}