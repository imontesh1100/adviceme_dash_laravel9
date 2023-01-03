<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function ajaxLogin(Request $req){
        try{
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/login', [
                'email' => $req->email,
                'passwd' => hash('sha256',$req->passwd)
            ])->json();
            if($response['status']==='success'){
                session(['session_token' => $response['data']['session_token']]);
                return response()->json(['status'=>true,'msg'=>Messages::LOGIN_OK,'url'=>route('home')]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }

    }
}
