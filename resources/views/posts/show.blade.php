
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 

<h1>Post(s) Details page</h1>
<p>This is my post Details page for Interracting with the database</p>

<!--output for array format two-->

<div class="card">
<h3>{{$Mypost->title}}</h3> <!--set parameter in the url-->
</div>
<li>{{$Mypost->body}}</li>
<li>{{$Mypost->created_at}}</li>
<li>{{$Mypost->user_id }}</li>
<li><img src="/storage/cover_images/{{$Mypost->cover_image}}" alt="{{$Mypost->cover_image}}" style="width:300px; height:300px;" /></li>


@if(!Auth::guest())<!--if user is a guest deny access-->
<!--we need to perform acheck such that the logged uer_id matches
the post user_id
-->
@if(Auth::user()->id == $Mypost->user_id)
<li><a href="/posts/{{$Mypost->id}}/edit" class="btn btn-primary btn-sm">Edit</a></li>
<li>
<!--
calling the destroy function directly from
Route::resource('posts', PostsController::class);
like posts.destroy
pass the id also into the action
-->
<form action="{{ route('posts.destroy', $Mypost->id) }}" method="post" name="FORM" 
  enctype="multipart/form-data">
  @csrf <!--it provided a token which verifies that the form submitted came from the same url of the application-->
  @method('DELETE')
<button type="submit" name="postsubmit" class="btn btn-danger btn-sm">
<i class="ion"></i> Delete
</button>
</form>
</li>
@endif
@endif
<br/>
<a href="/posts" class="btn btn-primary">Back</a>

@endsection
<!--code above is for templating-->