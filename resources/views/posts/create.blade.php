
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 

<h1>Create a Posts</h1>
<p>Creating a post to the database Interracting with the database</p>

<!--create store-form route in routes-->
<form action="{{url('store-form')}}" method="post" name="FORM" 
  enctype="multipart/form-data">
  @csrf <!--it provided a token which verifies that the form submitted came from the same url of the application-->
  <div class="card">
<div class="card-header">
@if(session('Success')) <!--test if session set for Success and output that in the session-->
<strong><h3>{{ session('Success') }}</h3></strong> 
@endif
</div>
<div class="card-body card-block">


<div class="form-group">
  <label for="title" class=" form-control-label">Title</label>
  <input type="text" id="title" name="title" placeholder="Enter title" class="form-control" required
  style="font-weight: bolder;"/><span class="help-block" style="font-weight: bolder;">Title</span>
</div>

<div class="form-group">
  <label for="body" class=" form-control-label">Body</label>
  <textarea id="body" name="body" placeholder="Enter body" class="form-control" required
  style="font-weight: bolder;"> </textarea>
  <span class="help-block" style="font-weight: bolder;">Body</span>
</div>

<div class="form-group">
  <label for="file" class=" form-control-label">Image</label>
  <input type="file" id="cover_image" name="cover_image" placeholder="cover image" class="form-control"
  style="font-weight: bolder;"/><span class="help-block" style="font-weight: bolder;">Cover image</span>
</div>

<button type="submit" name="postsubmit" class="btn btn-primary btn-lg">
<i class="ion"></i> Save
</button>

</div>

</div>
  </form>

@endsection
<!--code above is for templating-->