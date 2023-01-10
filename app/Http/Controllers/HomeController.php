<?php

namespace App\Http\Controllers;

use App\Utils\Messages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Pool;

class HomeController extends Controller
{
    public function home(Request $req){
        // Log::channel('custom')->info('Errorrrr test');
        $baseUrl='https://094z0k64j3.execute-api.us-east-2.amazonaws.com/v1/main-page/';
        $target_period=$req->query('target_period', 'all');
        try{
            $responses = Http::pool(fn (Pool $pool) => [
                $pool->as('stats')->post($baseUrl.'stats-users',['session_token' => session('session_token')]),
                $pool->as('results')->post($baseUrl.'results',['session_token' => session('session_token'),'target_period' => $target_period]),
                $pool->as('comparative')->post($baseUrl.'comparative',['session_token' => session('session_token')]),
                $pool->as('logged')->post($baseUrl.'users-loggedin',['session_token' => session('session_token')]),
                $pool->as('sales')->post($baseUrl.'sales-by-category',['session_token' => session('session_token'),'target_period' => $target_period]),
                $pool->as('countries')->post($baseUrl.'sales-by-country',['session_token' => session('session_token'),'target_period' => $target_period]),
            ]);
            if($responses['stats']['status']==='success' &&
                $responses['results']['status']==='success' && 
                $responses['logged']['status']==='success' && 
                $responses['sales']['status']==='success' && 
                $responses['countries']['status']==='success' && 
                $responses['comparative']['status']==='success'){
                // return $responses['countries']['data'];
                return view('home',
                    ['target_period'=>$target_period,
                    'general'=>$responses['stats']['data'],
                    'results'=>$responses['results']['data'],
                    'comparative'=>$responses['comparative']['data'],
                    'logged'=>$responses['logged']['data'],
                    'sales'=>$responses['sales']['data'],
                    'countries'=>$responses['countries']['data'],
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
