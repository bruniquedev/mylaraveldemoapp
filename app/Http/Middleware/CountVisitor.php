<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;//gets the model
use App\Models\PageVisits;// gets the model
use DB;// gets you to use sql queries
class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //handling visitor insertion  and page view updating 
        //$ip = $request->ip();
       $ip =$request->getClientIp();

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          //ip from share internet
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          //ip pass from proxy
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }else{
          $ip = $_SERVER['REMOTE_ADDR'];
      }

       // $route = Route::currentRouteName();//get current page name/route name
        $route =$request->route()->getName();
        $pagetoview=$route;
        //fetch visitor details using page and userip
       // Visitor::where('page', $route)->where('userip', $ip)->count() < 1
      $details= Visitor::where('page', $route)->where('userip', $ip)->count();

        //if it does exist, then do nothing
//if($details->userip !="" && $details->created_at!=today()) {
if($details < 1) {
    
            $url ='https://www.iplocate.io/api/lookup/'.$ip;
            $request_url = $url;
            $curl = curl_init($request_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
             $response = curl_exec($curl);
            curl_close($curl);
            //print_r(json_decode($response));
  //$response = json_decode($response,true);
  $response = json_decode($response);
  $country="";
  $country_code="";
  $city="";
  $continent="";
  $latitude="";
  $longitude="";
   if(!empty($response)){
 $country=$response->country; // 
  $country_code=$response->country_code; // 
  $city=$response->city;
  $continent= $response->continent; // 
  $latitude= $response->latitude; // 37.751
  $longitude= $response->longitude; // -97.822
  
  //insert the data
            Visitor::create([
'page'=> $route,
'userip'=> $ip,
'country'=> $country,
'city'=> $city,
'countrycode'=> $country_code,
'latitude'=> $latitude,
'longitude'=> $longitude
            ]);

            //make sure you register fillables in the Visitor model
            
           }   
        }


        //fetch all inserted rows and get their total number
       /*
       $data = DB::table('pagevisits')->select('pagevisits.id','pagevisits.title')->where('pagevisits.status', '1')->get();
        //$users = DB::table('users')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'contacts.phone', 'orders.price')
        ->get();
        */
        
        $data = DB::select("select * from page_visits where page='$pagetoview'");
        $page_view="";
        if(count($data) > 0){
     foreach($data as $data_returned){  
        $page_view=$data_returned->page;
            }
        }
           
          if($page_view !=$pagetoview){
             //insert
             PageVisits::create([
                'page'=> $route,
                'totalvisit'=>'1'
                    ]);
                //make sure you register fillables in the PageVisits model

          }else if($page_view == $pagetoview){
    $dataupdate = DB::update("Update page_visits set totalvisit = totalvisit+1 where 
            page='$page_view'");
            //update

          }



        return $next($request);
    }
}
