<?php

namespace App\Http\Controllers;

use App\Jobs\SendWhatsappMessage;
use App\Models\Logs;
use App\Models\Payers;
use App\Models\Sales;
use App\Models\User;
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
            Logs::insert([
                'icon'=>'dripicons-lightbulb',
                'title'=>"Giriş",
                'text'=>User::where('username',$req->username)->first()->name." adlı kullanıcı ".Carbon::now()." tarihinde giriş yaptı.",
                'color'=>'secondary',
                'user_id'=>Auth::id(),
                'created_at'=>Carbon::now(),
            ]);
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
        Logs::insert([
            'icon'=>'bx bx-git-compare',
            'title'=>"Güncelleme",
            'text'=>Auth::user()->name." adlı kullanıcı ".$req->id." id numaralı borcu düzenledi.",
            'color'=>'success',
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
    }
    public function get_edit_sale_form(Request $req){
        $req->validate(['id'=>'required']);
        return view('section.editsale_modal_content',['sale'=>Sales::where('id',$req->id)->first()]);
    }
    public function update_sale(Request $req){
        $req->validate(
            [
                'payment_method'=>'required',
                'payment_status'=>'required',
                'total'=>'required',
                'id'=>'required'
            ]
        );

        Sales::where('id',$req->id)->update([
            'price'=>$req->total,
            'payment_status'=>explode('-',$req->payment_status)[1],
            'payment_status_color'=>explode('-',$req->payment_status)[0],
            'payment_method'=>$req->payment_method,
            'description'=>$req->description
        ]);
        Logs::insert([
            'icon'=>'bx bx-git-compare',
            'title'=>"Güncelleme",
            'text'=>Auth::user()->name." adlı kullanıcı ".$req->id." id numaralı satışı düzenledi.",
            'color'=>'success',
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
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
            'description'=>$req->description,
            'created_at'=>Carbon::now(),
        ]);
        Logs::insert([
            'icon'=>'dripicons-information',
            'title'=>"Ekleme",
            'text'=>Auth::user()->name." adlı kullanıcı borç oluşturdu.",
            'color'=>'success',
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
    }
    public function get_paydetail(Request $req){
        $req->validate([
            'id'=>'required'
        ]);
        return view("section.detailpay_modal_content",['payer'=>Payers::where('id',$req->id)->first()]);
    }
    public function create_sale(Request $req){
        $req->validate(
            [
                'payment_method'=>'required',
                'payment_status'=>'required',
                'total'=>'required',

            ]
        );

        Sales::insert([
            'price'=>$req->total,
            'payment_status'=>explode('-',$req->payment_status)[1],
            'payment_status_color'=>explode('-',$req->payment_status)[0],
            'payment_method'=>$req->payment_method,
            'description'=>$req->description,
            'created_at'=>Carbon::now(),
        ]);

        Logs::insert([
            'icon'=>'dripicons-anchor',
            'title'=>"Ekleme",
            'text'=>Auth::user()->name." adlı kullanıcı satış oluşturdu.",
            'color'=>'success',
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
    }
    public function setPanelColor(Request $req){
        $req->validate([
            'color'=>'required'
        ]);

        return response()->json([
            'color'=>$req->color,
            'status'=>'success'
        ])->withCookie(cookie('panel_color',$req->color,315456,'/'));
    }






}
