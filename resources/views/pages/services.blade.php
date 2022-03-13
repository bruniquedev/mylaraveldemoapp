
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 
<!--paramater is passed from pageControllers under index function
is recieved and outputted like as $title in doubled braces
-->
<!--output for array format two-->
<h1>{{$title}}</h1>
<p>Here we passed an array data assuming from the database</p>
<!--output for array format two-->
<!--let's check if array not empty-->
@if(count($services) > 0)
<!--iterate through an array-->
@foreach($services as $service)
<li>{{$service}}</li>
@endforeach
@endif
<p>This is my services page for beginners</p>
@endsection
<!--code above is for templating-->







<!--This code does not use blade templating view but above code is using templating view-->
<!--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name','Bruno demo')}}</title>-->
<!--This is the app name which is configured from .env file on APP_NAME.
These ouble double braces you see  work as echo, in laravel we do'nt use echo but we use those braces with in
 them, are your output.
 Also note that doing 'app.name','Bruno demo' we are like testing a condition forexample if app.name 
 not existing out put Bruno demo.
-->
       
<!--
    </head>
    <body class="antialiased">
   
<h1>Services page</h1>
<p>This is my services page for beginners</p>

    </body>
</html>
-->