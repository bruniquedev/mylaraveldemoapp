<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//must be imported
use DB;//import if you want to use sql commands directly
use Illuminate\Support\Facades\Storage;// will enable us access storage directory in the public folder for deleting file purposes
class PostsController extends Controller
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

//we might not want limit viewing posts for non-loggedin users
//we need to pass an array of pages to be viewed for non-loggedin users
        $this->middleware('auth',['except'=>['index','show']]);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
 // to retrieve all the data in the table, we use object relating or relations
       // return Post::all();// this will just render a json array of values in the browser
        //we need to pass the the array as parameter for iteration and display
     // $posts = Post::all();
 //using order by id or title whatever
  // $posts = Post::orderBy('id','desc')->get();// you can use asc or desc
     //USING sql command directly, you must first import "use DB;" 
  $posts =DB::select('select * from posts');
  return view('posts.index')->with('Myposts',$posts);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //returns a view which contains our form
    return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             //handling the file upload
             //check if user has opted to upload the file
             if($request->hasFile('cover_image')){
//get file name with extension
$fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
//get just file name
$fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//get the extension
$extension = $request->file('cover_image')->getClientOriginalExtension();
  //file name to store  we concatinate time to differentiate a file from other files
  $fileNameToStore  = $fileName.'_'.time().'.'.$extension; 
  //upload the file 
  //Create folder cover_images  in public directory
  $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore); 
}else{
               $fileNameToStore ='user.png';
             }


        //let's try to store our data using tinker like commands here
        //
           //inserting data
        $post = new Post;
        $post->title = $request->title; //captured from form
        $post->body = $request->body;//captured from form
        $post->user_id = auth()->user()->id;//we capture the logged in user id from the user auth if is logged in
        $post->cover_image = $fileNameToStore;
        $post->save();
         return redirect('/posts/create')->with('Success','Post created sucessfully '); //create a session variable Success to store
         //amessage
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // to retrieve a specified  data in the table, we use object relating or relations
       // return Post::find($id);// this will just render a json array of values in the browser
       // return view('posts.index');
        //we need to pass the the array as parameter for iteration and display
      $post = Post::find($id);
     //$post =DB::select("select * from posts where id='$id'");
      return view('posts.show')->with('Mypost',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //returns a view which contains our form to display data to edit
        $post = Post::find($id);

          //we need to check if this user trying to edit the post owns it
                if(auth()->user()->id != $post->user_id){
                               return redirect('/posts')->with('Error','Unauthorised access of the post'); //create a session variable error to store amessage
                }
          return view('posts.edit')->with('Mypost',$post);//pass data to edit page
                
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


//handling the file upload
//check if user has opted to upload the file
if($request->hasFile('cover_image')){
//get file name with extension
$fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
//get just file name
$fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//get the extension
$extension = $request->file('cover_image')->getClientOriginalExtension();
//file name to store  we concatinate time to differentiate a file from other files
$fileNameToStore  = $fileName.'_'.time().'.'.$extension; 
//upload the file 
//Create folder cover_images  in public directory but not manually, with a command
$path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore); 
}
      //let's try to store our data using tinker like commands here
        //
           //updating a post data
           $post = Post::find($id); //so we will have to find a particular post
           $post->title = $request->title; //captured from form
           $post->body = $request->body;//captured from form
           //check if user has opted to upload the file
           if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
           }
           $post->save();
           //DB::update('update student set first_name = ?,last_name=?,city_name=?,email=? where id = ?',[$first_name,$last_name,$city_name,$email,$id]);
            return redirect('/posts')->with('Success','Post updated sucessfully '); //create a session variable Success to store
            //amessage
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id); //so we will have to find a particular post  
        
        //deleting an image from it's directory
        //noimage.jpg is our default image which does not exists
        //if cover_image in db not equal to noimage.jpg
        if($post->cover_image != 'user.png'){
        Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        //here we are going to delete from the database
        $post->delete();
        return redirect('/posts')->with('Success','Post deleted sucessfully '); //create a session variable Success to store
        //amessage
        //
    }
}
