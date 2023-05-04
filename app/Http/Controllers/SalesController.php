<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SalesController extends Controller
{
    public function advisors(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'sales-per-advisor',[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // return $response;
                if($page > $response['data']['lastPage']){return abort(404,Messages::TABLE_ERROR);}
                return view('sales.advisors',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['lastPage'],
                    'byPeriod'=>$response['data']['sales_by_period'],
                    'advisors'=>$response['data']['sales_per_advisor'],
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
    public function advisorSales($advisorID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'advisor-name-sales',[
                'session_token' => session('session_token'),
                'id_user_consultant' => $advisorID,
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                if($page > $response['data']['lastPage']){return abort(404,Messages::TABLE_ERROR);}
                return view('sales.advisor',
                    ['page'=>$page,
                    'advisorID'=>$advisorID,
                    'lastPage'=>$response['data']['lastPage'],
                    'salesInfo'=>$response['data'],
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
    public function advisorSalesCommisions($advisorID,Request $req){
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/advisor-detail-commissions';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_user_consultant' => $advisorID,
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                // if($page > $response['data']['lastPage']){return abort(404,Messages::TABLE_ERROR);}
                return view('sales.advisor_commissions',
                    ['page'=>$page,
                    'advisorName'=>$response['data']['name_advisor'],
                    'lastPage'=>$response['data']['lastPage'],
                    'commissions'=>$response['data']['detail_commissions'],
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
    public function updateCommissionStatus(Request $req){
        // return response()->json(['status'=>true,'msg'=>Messages::COMMISSION_UPDATED]);
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/change-status-commission';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_request' => $req->id_request,
            ]);
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::COMMISSION_UPDATED]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::COMMISSION_ERROR]);
        }
    }
    public function updateReceiptStatus(Request $req){
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/change-status-sale';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_request' => $req->id_request,
            ]);
            if($response['status']==='success'){
                return response()->json(['status'=>true,'msg'=>Messages::RECEIPT_UPDATED]);
            }else{
                return response()->json(['status'=>false,'msg'=>$response['message']]);
            }
        }catch(Exception $e){
            return response()->json(['status'=>false,'msg'=>Messages::RECEIPT_ERROR]);
        }
    }
    public function withoutCFDI(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'sales-by-status',[
                'session_token' => session('session_token'),
                'id_status' => 2,
                'cfdi' => '0',
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                return view('sales.advisor_without_cfdi',
                    ['page'=>$page,
                    'sales'=>$response['data'],
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
    public function withCFDI(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'sales-by-status',[
                'session_token' => session('session_token'),
                'id_status' => 2,
                'cfdi' => '1',
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                return view('sales.advisor_with_cfdi',
                    ['page'=>$page,
                    'sales'=>$response['data'],
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
    public function payed(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'sales-by-status',[
                'session_token' => session('session_token'),
                'id_status' => 4,
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                return view('sales.advisor_payed',
                    ['page'=>$page,
                    'sales'=>$response['data'],
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
    public function advisorReceipt($receiptID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/advisor-sales/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'tickets',[
                'session_token' => session('session_token'),
                'id_request' => $receiptID
            ]);
            if($response['status']==='success'){
                return view('sales.advisor_receipt',['info'=>$response['data']]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }
        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,Messages::REQUEST_ERROR);
        }
    }
    public function clients(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/customer-purchases/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'sales-per-customer',[
                'session_token' => session('session_token'),
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                if($page > $response['data']['last_page']){return abort(404,Messages::TABLE_ERROR);}
                return view('sales.clients',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'byPeriod'=>$response['data']['sales_by_period'],
                    'customers'=>$response['data']['sales_per_customer'],
                ]);
            }else{
                // $req->session()->flush();
                abort(500,Messages::HOME_ERROR);
            }

        }catch(Exception $e){
            // $req->session()->flush();
            abort(500,$e->getMessage());
        }
    }
    public function client($clientID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/customer-purchases/';
        $page=$req->query('page', 1);
        try{
            $response = Http::post($baseUrl.'customer-name-purchases',[
                'session_token' => session('session_token'),
                'id_user_customer' => $clientID,
                'page' => $page,
                'items' => 5,
            ]);
            if($response['status']==='success'){
                if($page > $response['data']['lastPage']){return abort(404,Messages::TABLE_ERROR);}
                return view('sales.client',
                    ['page'=>$page,
                    'clientID'=>$clientID,
                    'lastPage'=>$response['data']['lastPage'],
                    'info'=>$response['data'],
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
    public function clientReceipt($receiptID,Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/customer-purchases/customer-ticket';
        try{
            $response = Http::post($baseUrl,[
                'session_token' => session('session_token'),
                'id_request' => $receiptID
            ]);
            if($response['status']==='success'){
                return view('sales.client_receipt',['info'=>$response['data']]);
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
