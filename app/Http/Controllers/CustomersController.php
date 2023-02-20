<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CustomersController extends Controller
{
    public function users(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/customer-purchases/customers-data';
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
                return view('customers.users',
                    ['page'=>$page,
                    'lastPage'=>$response['data']['last_page'],
                    'totalUsers'=>$response['data']['num_customers'],
                    'customerSales'=>$response['data']['customerDataSales']
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
}
