<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ReferedController extends Controller
{
    public function index($parentCode,Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/general/get-catalogs', [
                'catalog' => "countries"
            ])->json();
            if($response['status']==='success'){
                return view('refered.index',['parentCode'=>$parentCode,
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
    public function verification($parentCode,Request $req){
        try{
            $validator = Validator::make($req->all(), [
                'email' => 'required|email',
                'country' => 'required|numeric'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return redirect()->back()->withErrors(['msg' =>$validator->errors()->first() ]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/advisors-register-email', [
                'email' => $req->email,
                'id_country' => $req->country,
                'parent_code' => $parentCode
            ])->json();
            if($response['status']==='success'){
                return view('refered.verification_code',['email'=>$req->email,'resendCodeUrl'=>route('ajax.refered.resendCode')]);
            }else{
                return redirect()->back()->withErrors(['msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return abort(500,Messages::REQUEST_ERROR);
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
    public function ajaxVerification(Request $req){
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
                return response()->json(['status'=>true,'url'=>route('refered.personal_data',['sessionToken'=>$response['data']['session_token']])]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function personalData($sessionToken,Request $req){
        try{
            $responses = Http::pool(fn (Pool $pool) => [
                $pool->as('catalogs')->post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/get-catalogs-personal-data', [
                'session_token' => $sessionToken]),
                $pool->as('personal_data')->post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-personal-info', [
                'session_token' => $sessionToken]),
            ]);
            $catalogs=$responses['catalogs']->json();
            $personalData=$responses['personal_data']->json();
            // return $personalData;
            // return date('Y-m-d',strtotime('December 28, 2005'));
            if($catalogs['status']==='success' && $personalData['status']==='success'){
            // dd($personalData['data']['personal_info']);
                return view('refered.personal_data',[
                    'sessionToken'=>$sessionToken,
                    'languages'=>$catalogs['data']['languages'],
                    'rates'=>$catalogs['data']['rates'],
                    'timezones'=>$catalogs['data']['time_zones'],
                    'personalInfo'=>$personalData['data']['personal_info']]);
            }else{
                return abort(500,Messages::REQUEST_ERROR);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
    public function updatePersonalData(Request $req){
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
                return redirect()->back()->withErrors(['msg' =>$validator->errors()->first()]);
            }
            $response = Http::post('https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/general/set-personal-data', [
                'session_token' => $req->token,
                'first_name' => $req->firstname,
                'last_name' => $req->lastname,
                'birthdate' => $req->birthdate,
                'id_rate_per_hour' => $req->rate,
                'id_time_zone' => $req->timezone,
                'languages' => [$req->language]
            ])->json();
            if($response['status']==='success'){
                return redirect(route('refered.documentation',['sessionToken'=>$req->token]));
            }else{
                return redirect()->back()->withErrors(['msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function ajaxProfileImg(Request $req){
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
    public function documentation($sessionToken,Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-categories', [
                'session_token' => $sessionToken
            ])->json();
            if($response['status']==='success'){
                return view('refered.documentation',[
                    'sessionToken'=>$sessionToken,
                    'categories'=>$response['data']['categories']]);
            }else{
                return abort(500,$response['message']);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
    public function ajaxIDPhoto(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'idPhoto'=>['required',File::types(['png','jpg'])->max(4096)]
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/upload-photo-id', [
                'session_token' => $req->token,
                'base64string'=>base64_encode(file_get_contents($req->file('idPhoto')->path()))
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::REFERED_ID_PHOTO_UPLOADED,'imageUrl'=>$response['data']['url']]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxGetCareers(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'category'=>['required']
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-careers', [
                'session_token' => $req->token,
                'id_category'=>$req->category
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'careers'=>$response['data']['careers']]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxGetExpertises(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'career'=> 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-expertise', [
                'session_token' => $req->token,
                'id_career'=>$req->career
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'expertises'=>$response['data']['expertise']]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxDocumentation(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'category'=> 'required',
                'career'=> 'required',
                'expertise'=> 'required',
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-expertise-data', [
                'session_token' => $req->token,
                'id_category'=>$req->category,
                'id_career'=>$req->career,
                'expertises'=>[$req->expertise]
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::DOCUMENTATION_UPLOADED,'url'=>route('refered.bio',['sessionToken'=>$req->token,'idCategory'=>$req->category,'idExpertise'=>$req->expertise])]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function bio($sessionToken,Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-biography', [
                'session_token' => $sessionToken
            ])->json();
            if($response['status']==='success'){
                return view('refered.bio',['sessionToken'=>$sessionToken,'idCategory'=>$req->idCategory,'idExpertise'=>$req->idExpertise,'bio'=>$response['data']['biography'][0]]);
            }else{
                return abort(500,$response['message']);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
    public function ajaxBio(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'id_category'=> 'required',
                'id_expertise'=> 'required',
                'short_description'=> 'required',
                'solution1'=> 'required',
                'solution2'=> 'required',
                'solution3'=> 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-biography', [
                'session_token' => $req->token,
                'id_category'=>$req->id_category,
                'short_description'=>$req->short_description,
                'solution1'=>$req->solution1,
                'solution2'=>$req->solution2,
                'solution3'=>$req->solution3,
            ])->json();
            $url = ($req->id_category==3) ? route('refered.professional_id',['sessionToken'=>$req->token,'idCategory'=>$req->id_category,'idExpertise'=>$req->id_expertise]) : route('refered.video',['sessionToken'=>$req->token]);
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::BIO_UPDATED,
                'url'=>$url]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function professionalID($sessionToken,Request $req){
        try{
            if($req->idExpertise==null) throw new Exception('Expertise ID is required');
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-expertise-details', [
                'session_token' => $sessionToken,
                'id_expertise'=> $req->idExpertise
            ])->json();
            if($response['status']==='success'){
                // dd($response);
                $expertise=isset($response['data']['expertiseDetails'][0]) ? $response['data']['expertiseDetails'][0]: null;
                return view('refered.professional_id',
                ['sessionToken'=>$sessionToken,'idExpertise'=>$req->idExpertise,'expertise'=>$expertise,'idCategory'=>$req->idCategory]);
            }else{
                return view('refered.professional_id',['sessionToken'=>$sessionToken,'idExpertise'=>$req->idExpertise,'idCategory'=>$req->idCategory]);
            }
        }catch(Exception $e){
            return abort(403,$e->getMessage());
        }
    }
    public function ajaxProfessionalID(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'id_expertise'=> 'required',
                'id_category'=> 'required',
                'professional_id'=> 'required',
                'institute'=> 'required',
                'professional_id_date'=> 'required',
                'phone_number'=> 'required|string|min:10'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-expertise-details', [
                'session_token' => $req->token,
                'id_expertise'=>$req->id_expertise,
                'id_category'=>$req->category,
                'professional_id'=>$req->professional_id,
                'institute'=>$req->institute,
                'professional_id_date'=>$req->professional_id_date,
                'phone_number'=>$req->phone_number,
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::PROFESSIONAL_UPDATED,
                'url'=>route('refered.address',['sessionToken'=>$req->token,'idExpertise'=>$req->idExpertise,'idCategory'=>$req->idCategory])]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function address($sessionToken,Request $req){
        return view('refered.address',['sessionToken'=>$sessionToken,'addressesURL'=>route('ajax.refered.get_addresses')]);
    }
    public function ajaxGetAddresses(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'address'=> 'required'
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-locations', [
                'session_token' => $req->token,
                'address'=>$req->address
            ])->json();
            if($response['status']==='success'){
                $addresses=array_map(function($place){
                    return ['value'=>$place['PlaceId'],'label'=>$place['Address']];
                },$response['data']['places']);
                return response()->json(['status'=>true,'addresses'=>$addresses]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function ajaxUpdateAddress(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'work_address'=> 'required',
                'place_id'=> 'required',
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-work-address', [
                'session_token' => $req->token,
                'work_address'=>$req->work_address,
                'place_id'=>$req->place_id,
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::ADDRESS_UPDATED,'url'=>route('refered.health',['sessionToken'=>$req->token])]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function health($sessionToken,Request $req){
        try{
            $res = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-personal-info', [
                'session_token' => $sessionToken
            ])->json();
            if($res['status']==='success'){
                $info=$res['data']['personal_info'];
                if($info['id_category']!= 3) throw new Exception('HEALTH category is required');
                $flags['personal']=($info['photo_profile'])?true:false;
                $flags['documentation']=($info['photo_id'] && $info['id_category'])?true:false;
                $flags['category']=($info['id_category'] && $info['id_career'] && (count($info['expertises_info'])>0) )?true:false;
                $flags['description']=($info['short_description'])?true:false;
                $flags['professional']=(isset($info['expertises_info'][0]['professional_id']))?true:false;
                $flags['address']=($info['work_address'])?true:false;

                return view('refered.health',[
                    'sessionToken'=>$sessionToken,
                    'flags'=>$flags,
                    'confirmAvailable'=>!in_array(null,$flags),
                    'idCategory'=>$info['id_category'],
                    'idExpertise'=>isset($info['expertises_info'][0]['professional_id'])?$info['expertises_info'][0]['id_expertise']:false
                ]);
            }else{
                return abort(500,$res['message']);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
    public function video($sessionToken,Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/get-personal-info', [
                'session_token' => $sessionToken
            ])->json();
            if($response['status']==='success'){
                return view('refered.video',['sessionToken'=>$sessionToken,'advisorID'=>$response['data']['personal_info']['id_user']]);
            }else{
                return abort(500,$response['message']);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
    public function ajaxVideoUrl(Request $req){
        try{
            $validator = Validator::make($req->all(),
            [
                'token' => 'required',
                'videoUrl'=> 'required',
            ]);
            if ($validator->stopOnFirstFailure()->fails()) {
                return response()->json(['status'=>false,'msg'=>$validator->errors()->first()]);
            }
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-video-presentation', [
                'session_token' => $req->token,
                'video_name'=>$req->videoUrl,
            ])->json();
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::VIDEO_UPDATED]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::REQUEST_ERROR]);
        }
    }
    public function confirm(Request $req){
        try{
            $response = Http::post('https://1yrbnau2jk.execute-api.us-east-2.amazonaws.com/v1/app/personal-info/set-complete-personal-info', [
                'session_token' => $req->token
            ])->json();
            if($response['status']==='success'){
                return view('refered.confirm');
            }else{
                return abort(500,$response['message']);
            }
        }catch(Exception $e){
            return abort(500,'Server Internal Error :(');
        }
    }
}
