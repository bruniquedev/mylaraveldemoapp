<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Todo;

class AjaxCrudController extends Controller
{
  
/*
Generically, create two functions here, and these functions propel the Laravel AJAX example. 
The index function renders all the records from the database, 
and preferably store method saves the data record in the database.
*/

/**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $todo = Todo::all();
        return view('pages.ajaxexample')->with(compact('todo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $todo = Todo::create($data);

        return Response::json($todo);
    }



}
