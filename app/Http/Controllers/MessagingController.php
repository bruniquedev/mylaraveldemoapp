<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;//must be imported
use DB;//import if you want to use sql commands directly
use Symfony\Component\HttpFoundation\StreamedResponse;
class MessagingController extends Controller
{
    


    public function messagescount(){
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setCallback(function(){
              
    //$visitors = Post::all();
     $visitors =DB::select('select * from visitors');
//add data to array
$data = array(
    'TotalVisitors'=>count($visitors)
);

//PASS data in json format
$outputcontent = json_encode($data);
echo "data: {$outputcontent}\n\n";

ob_end_flush();// Sends output data from PHP to Apache. 
flush();// Sends output from Apache to browser.
sleep(3); // wait for 10 seconds

               
            });

        return $response;

        //$visitors = Post::all();
       // $visitors =DB::select('select * from visitors');
     // return view('pages.index')->with('title',$title);
     
     
     }





}
