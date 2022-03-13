
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 

<h1>Edit a Post</h1>
<p>Editting a post to the database Interracting with the database</p>

<!--create update-form route in routes
calling the  update function directly from
Route::resource('posts', PostsController::class);
like posts.update
pass the id also into the action
-->
<form action="{{ route('posts.update', $Mypost->id) }}" method="post" name="FORM" 
  enctype="multipart/form-data">
  @csrf <!--it provided a token which verifies that the form submitted came from the same url of the application-->
  @method('PUT')
  <div class="card">
<div class="card-header">
@if(session('Success')) <!--test if session set for Success and output that in the session-->
<strong><h3>{{ session('Success') }}</h3></strong> 
@endif
</div>
<div class="card-body card-block">


<div class="form-group">
  <label for="title" class=" form-control-label">Title</label>
  <input type="text" id="title" name="title" value="{{$Mypost->title}}" placeholder="Enter title" class="form-control" required
  style="font-weight: bolder;"/><span class="help-block" style="font-weight: bolder;">Title</span>
</div>
<div class="form-group">
  <label for="body" class=" form-control-label">Body</label>
  <textarea id="body" name="body" placeholder="Enter body" class="form-control" required
  style="font-weight: bolder;">{{$Mypost->body}} </textarea>
  <span class="help-block" style="font-weight: bolder;">Body</span>
</div>

<div class="form-group">
  <label for="file" class=" form-control-label">Image</label>
  <input type="file" id="cover_image" name="cover_image" placeholder="cover image" class="form-control"
  style="font-weight: bolder;"/><span class="help-block" style="font-weight: bolder;">Cover image</span>
</div>

<button type="submit" name="postsubmit" class="btn btn-primary btn-lg">
<i class="ion"></i> Update
</button>

</div>

</div>
  </form>

@endsection
<!--code above is for templating-->