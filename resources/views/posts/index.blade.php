
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 

<h1>Posts</h1>
<p>This is my Posts page for Interracting with the database</p>
<a href="/posts/create" class="btn btn-primary">Create a new post</a>
<!--output for array format two-->
<!--let's check if array not empty-->

@if(session('Success')) <!--test if session set for Success and output that in the session-->
<strong><h3>{{ session('Success') }}</h3></strong> 
@endif

@if(session('Error')) <!--test if session set for Error and output that in the session-->
<strong><h3>{{ session('Error') }}</h3></strong> 
@endif

@if(count($Myposts) > 0)
<!--iterate through an array-->
@foreach($Myposts as $posts)
<div class="card">
<h3><a href="/posts/{{$posts->id}}">{{$posts->title}}</a></h3> <!--set parameter in the url-->
</div>
<li>{{$posts->body }}</li>
<li>{{$posts->created_at }} <?php 
date_default_timezone_set('Africa/Kampala');
$newDateTime = date('Y-m-d h:i:s A', strtotime($posts->created_at));
echo $myfunc = time_ago_in_php($newDateTime); ?></li>
@endforeach
@endif

@endsection
<!--code above is for templating-->