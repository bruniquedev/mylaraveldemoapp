<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //inside this class we create a function or a method

  //lets   try to pass some values or parameters to our views using blade templating
 //we need to inform the routes about this function in web.php
 public function Index(){

   // return'index';//you can return a string
//you can return a view which should be found in resources->views->pages(created subfolder by you)->index.blade.php
 $title ="Welcome to brunique laravel programming!";

 // there are two ways of passing parameters
 //1. using compact
//return view('pages.index',compact('title'));
 //2. using with
 return view('pages.index')->with('title',$title);


}

public function About(){
//you can return a view which should be found in resources->views->pages(created subfolder by you)->about.blade.php
$title ="About page";
// there are two ways of passing parameters
 //1. using compact
//return view('pages.about',compact('title'));
 //2. using with
 return view('pages.about')->with('title',$title);

 }

 public function Services(){
    //you can return a view which should be found in resources->views->pages(created subfolder by you)->about.blade.php
      //Another scenario we can pass multiple database array as parameter value
   /*  
   //array format one
    $data = array(
         'title'=>'Services'
      );
      */
//array format two
      $data = array(
         'title'=>'Services',
          'services'=>['Web Design','Programming','SEO']

      );



          return view('pages.services')->with($data);
        }
//the code above is using templating views





    //This code is not using  templating views but above code is using template views
    /*
    //we need to inform the routes about this function in web.php
    public function Index(){

       // return'index';//you can return a string
    //you can return a view which should be found in resources->views->pages(created subfolder by you)->index.blade.php
     return view('pages.index');
    }

    public function About(){
 //you can return a view which should be found in resources->views->pages(created subfolder by you)->about.blade.php
   
       return view('pages.about');
     }

     public function Services(){
        //you can return a view which should be found in resources->views->pages(created subfolder by you)->about.blade.php
          
              return view('pages.services');
            }
            */


}
