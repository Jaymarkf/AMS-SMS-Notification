<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $url = 'https://test-data-api.000webhostapp.com/data.php';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER,false);
        $result= curl_exec($curl);
        
        $data =  json_decode($result,true);
       
        
        if($data['trial'] == 1 ){
            return view('expired');
        }else if($data['max_usage'] == 1){
            return view('max_usage');
        }else{

            if(!$request->session()->has('login')){
                return redirect('login')->with('no_user','You need to login first!');
            }
            return $next($request);
        }


      
    
    }
   
}
