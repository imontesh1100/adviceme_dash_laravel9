<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdvisorsController extends Controller
{
    public function noVisible(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/advisors-not-visibles';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // return $response;
                if($page > $response['data']['last_page']){return abort(404,Messages::TABLE_ERROR);}
                return view('advisors.users_no_visible',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'totalAdvisors'=>$response['data']['num_advisors'],
                    'advisorsNotVisibles'=>$response['data']['advisorsNotVisibles']
                ]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }

        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function pendingVisible(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/advisors-pending-visible';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // if($page > $response['data']['last_page']){return abort(404,Messages::TABLE_ERROR);}
                return view('advisors.users_pending_visible',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'totalAdvisors'=>$response['data']['num_advisors'],
                    'advisorsPendingVisibles'=>$response['data']['advisorsPendingVisibles']
                ]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }

        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function visible(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/advisors-visibles';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // if($page > $response['data']['last_page']){return abort(404,Messages::TABLE_ERROR);}
                return view('advisors.users_visible',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'totalAdvisors'=>$response['data']['num_advisors'],
                    'advisorsVisibles'=>$response['data']['advisorsVisibles']
                ]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }

        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function disabled(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/advisors-disabled';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // if($page > $response['data']['last_page']){return abort(404,Messages::TABLE_ERROR);}
                return view('advisors.users_disabled',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'totalAdvisors'=>$response['data']['num_advisors'],
                    'advisorsDisabled'=>$response['data']['advisorsDisabled']
                ]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }

        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function profile($advisorID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/advisor-profile';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $advisorID
            ]);
            if($response['status']==='success'){
                return view('advisors.profile',['profile'=>$response['data']['advisorProfile']]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage1($advisorID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/verify-stage1';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $advisorID
            ]);
            // return $response;
            if($response['status']==='success'){
                return view('advisors.verify1',['data'=>$response['data']]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage1Positive(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/set-verified-stage1';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $req->advisorID
            ]);
            // return $response;
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::STAGE1_VERIFIED]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage1StillPending(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/set-still-pending-options';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $req->advisorID,
                'still_pending_option' => $req->pendingOption,
                'stage' => 1
            ]);
            // return $response;
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::STAGE1_STILL_PENDING]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage1Disable(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/set-disable-options';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $req->advisorID,
                'disable_option' => $req->disableOption
            ]);
            // return $response;
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::STAGE1_DISABLED]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage2($advisorID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/verify-stage2';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $advisorID
            ]);
            // return $response;
            if($response['status']==='success'){
                return view('advisors.verify2',['data'=>$response['data']]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function stage2Positive(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisors-status/set-verified-stage2';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_advisor' => $req->advisorID
            ]);
            // return $response;
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::STAGE2_VERIFIED]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
}
