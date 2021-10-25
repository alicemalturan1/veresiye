<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function calc_daily_salestatus(){
        $today = count(\App\Models\Sales::whereDate('created_at',\Illuminate\Support\Carbon::today())->get());
        $yesterday = count(\App\Models\Sales::whereDate('created_at',\Illuminate\Support\Carbon::yesterday())->get());
        $diff = $today - $yesterday;
        $diff_percent=0;
        $up = false;

        if($diff>0){
            $diff_percent = ($yesterday/$today)*100;
            $up = true;
            if($today == 0 || $yesterday == 0){
                $diff_percent = 100;
            }
        }else if($diff<0){
            $diff_percent = ($today/$yesterday)*100;
            if($today == 0 || $yesterday == 0){
                $diff_percent = 100;
            }
        }
        return ['diff_percent' =>$diff_percent,'up'=>$up];
    }
    public function more_log(Request $req){
        return response()->json(Logs::orderBy('id','desc')->skip($req->skip)->take(10)->get());
    }
    public function update_wpapiconfig(Request $req){
        config(['whatsapp.agent' => $req->agent]);
        config(['whatsapp.api_key' => $req->api_key]);
        config(['whatsapp.api_secret' => $req->api_secret]);
        config(['whatsapp.message_schema' => $req->message_schema]);

        $fp = fopen(base_path() .'/config/whatsapp.php' , 'w');

        fwrite($fp, '<?php return ' . var_export(config('whatsapp'), true) . ';');

        fclose($fp);

        Artisan::call('cache:clear');

        Config::set([],$req->agent);
    }
}
