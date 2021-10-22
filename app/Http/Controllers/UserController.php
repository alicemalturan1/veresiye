<?php

namespace App\Http\Controllers;

use App\Jobs\SendWhatsappMessage;
use App\Models\Payers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public function login(Request $req){
        $req->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt(['username'=>$req->username,'password'=>$req->password],$req->remember_me)){
            return response()->json([
                'access'=>true,
            ]);
        }
    }

    public function update_presencepay(Request $req){
        $req->validate([
            'id'=>'required',
            'presence'=>'required'
        ]);
        Payers::where('id',$req->id)->update([
            'odeme_durumu'=>$req->presence,
            'updated_at'=>Carbon::now('GMT+3'),
            'odeme_yil'=>Carbon::now('GMT+3')->year,
            'odeme_ay'=>Carbon::now('GMT+3')->month,
            'odeme_gun'=>Carbon::now('GMT+3')->day,
        ]);
    }

    public function create_pay(Request $req){
        $req->validate(
            [
                'name'=>'required',
                'phone'=>'required|min:10|max:10',
                'total'=>'required',
                'category'=>'required',

            ]
        );

        Payers::insert([
            'ad'=>$req->name,
            'kategori'=>$req->category,
            'borc_miktari'=>$req->total,
            'telefon_no'=>$req->phone,
            'description'=>$req->description
        ]);

    }








    private static function callAPI($token, $method, $url, $data){
        $curl = curl_init();

        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . $token,
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl);



        curl_close($curl);

        return $result;
    }
    public static function start_agent($token,$url){
        $curl = curl_init();


                curl_setopt($curl, CURLOPT_POST, 1);

                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(['identity'=>"905431222325@s.whatsapp.net"]));


        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization:Basic '.$token,
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl);



        curl_close($curl);

        return $result;

    }
    public static function mesaj_gonder(){
        // Replace with Your API Client Key
        $clientKey = ')xYcW@R75Jg0';
        // Replace with Your API Client Secret
        $clientSecret = 'vg)sGbjaPX9sGM0O@NvaskkhdVE)HN27';
        // compiled client with base64
        $clientToken = base64_encode($clientKey.':'.$clientSecret);



        $url = 'https://api.profilora.com/whatsapp/send-message';

        // this must be matched with the number on the registered agent
        $senderNo = '905431222325@s.whatsapp.net';
        $data_array = array(
            'sender' => '905431222325@s.whatsapp.net',
            'to' => '905388813080@s.whatsapp.net',
            'message' => 'php ile deneme'
        );

        $make_call = self::callAPI($clientToken, 'POST',  $url, json_encode($data_array));
        $response = json_decode($make_call, true);
        return $response;
    }
    public function bilgilendir(Request $req){

        $clientKey = ')xYcW@R75Jg0';
        // Replace with Your API Client Secret
        $clientSecret = 'vg)sGbjaPX9sGM0O@NvaskkhdVE)HN27';
        // compiled client with base64
        $clientToken = base64_encode($clientKey.':'.$clientSecret);

        $resp= UserController::mesaj_gonder();
        if(!array_key_exists('eventId',$resp)){
            self::start_agent($clientToken,'https://profilora.com/api/wa/start-agent');
            dd(self::start_agent($clientToken,'https://profilora.com/api/wa/agent-fetch'));

        }
        return $resp;
    }
}
