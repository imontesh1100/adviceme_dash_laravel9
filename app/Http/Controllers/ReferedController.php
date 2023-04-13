<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ReferedController extends Controller
{
    public function refered($parentCode,Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/general/get-catalogs', [
                'catalog' => "countries"
            ])->json();
            if($response['status']==='success'){
                return view('refered',['parentCode'=>$parentCode,
                'countries'=>$response['data']['countries'],
                'resendCodeUrl'=>route('ajax.refered.resendCode')]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
        // $imagePath = public_path("images/avatar.jpeg");
        // $image = base64_encode(file_get_contents($imagePath));
        // dd($image);
    }
    public function ajaxStep1(Request $req){
        try{
            $validator = Validator::make($req->all(), [
                'email' => 'required|email',
                'country' => 'required|numeric',
                'parent' => 'required',
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/advisors-register-email', [
                'email' => $req->email,
                'id_country' => $req->country,
                'parent_code' => $req->parent
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'email'=>$req->email]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxStep2(Request $req){
        try{
            $validator = Validator::make($req->all(), [
                'email' => 'required|email',
                'verificationCode' => 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/verification-code', [
                'email' => $req->email,
                'email_code' => $req->verificationCode
            ])->json();
            if($response['status']==='success'){
                $res = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/get-catalogs-personal-data', [
                    'session_token' => $response['data']['session_token']
                ])->json();
                return response()->json(['status'=>true,
                    'token'=>$response['data']['session_token'],
                    'languages'=>$res['data']['languages'],
                    'rates'=>$res['data']['rates'],
                    'timezones'=>$res['data']['time_zones'],
                ]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function resendCode(Request $req){
        try{
            $validator = Validator::make($req->all(), [
                'email' => 'required|email'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>true,'msg'=>Messages::REQUEST_ERROR]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/resend-code', [
                'email' => $req->email
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>$response['message']]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function profileImg(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'profileImage'=>['required',File::types(['png','jpg'])->max(4096)]
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/upload-photo-profile', [
                'session_token' => $req->token,
                'base64string'=>base64_encode(file_get_contents($req->file('profileImage')->path()))
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::REFERED_IMAGE_UPLOADED,'imageUrl'=>$response['data']['url']]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxStep3(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'birthdate' => 'required',
                'language' => 'required',
                'rate' => 'required',
                'timezone' => 'required',
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>true,'msg'=>Messages::REQUEST_ERROR]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/set-personal-data', [
                'session_token' => $req->token,
                'first_name' => $req->firstname,
                'last_name' => $req->lastname,
                'birthdate' => $req->birthdate,
                'id_rate_per_hour' => $req->rate,
                'id_time_zone' => $req->timezone,
                'languages' => $req->language
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
}
