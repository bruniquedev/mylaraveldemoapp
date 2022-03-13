<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//must be imported
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
//this helps in limiting those who are not logged in
//you can copy and paste this into other controllers where you want to limit login
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;//store logged in user id in user_id
        //let's find the user using user_id
        $user=User::find($user_id);
        //pass user posts into the home view
        return view('home')->with('Theposts',$user->posts);
    }
}
