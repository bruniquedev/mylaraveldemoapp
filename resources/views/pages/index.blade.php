
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 
<!--paramater is passed from pageControllers under index function
is recieved and outputted like as $title in doubled braces
-->
<h1>{{$title}}</h1>
<p>This is a laravel for beginners</p>
<button type="button" name="ProfileUpdate" class="btn btn-primary btn-lg">Hello let's get started</button>
@endsection
<!--code above is for templating-->





<!--This code does not use blade templating view but above code is using templating view-->
<!--
<!DOCTYPE html>
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
   
<h1>Welcome to laravel for beginners</h1>
<p>This is a laravel for beginners</p>

    </body>
</html>
-->