<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Pre_registroController extends Controller
{
    const CODE      = 200;
    const HEADER    = array ('Content-Type' => 'application/json');
    const URL       ="http://adviceme.mx";

    public function advisors(Request $request)
    {
        try {
            $page=$request->query('page',1);
            if(!is_numeric($page)){
               return redirect(404);
            }
            $response=Http::get(self::URL."/api/get_advisors?page=$page");
            if(!is_array($response["data"])){
                return redirect(404);
            }
            return view("pre-registro.advisors")->with(["response"=>$response]);
        } catch (\Exception $e) {
            return redirect(404);
        }
    }
    public function users(Request $request)
    {
        try {
            $page=$request->query('page',1);
            if(!is_numeric($page)){
               return redirect(404);
            }
            $response=Http::get(self::URL."/api/get_users?page=$page");
            if(!is_array($response["data"])){
                return redirect(404);
            }
            return view("pre-registro.users")->with(["response"=>$response]);
        } catch (\Exception $e) {
            return redirect(404);
        }
    }
    public function advisorsCSV()
    {
        $response=Http::get(self::URL."/api/get_advisors/CSV");
        return $response;
    }
    public function usersCSV()
    {
        $response=Http::get(self::URL."/api/get_users/CSV");
        return $response;
    }
}
