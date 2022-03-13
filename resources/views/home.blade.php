@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


    @if(count($Theposts) > 0)
<!--iterate through an array-->
@foreach($Theposts as $posts)
<div class="card">
<h3><a href="/posts/{{$posts->id}}">{{$posts->title}}</a></h3> <!--set parameter in the url-->
</div>
<li>{{$posts->body}}</li>
<li>{{ $posts->created_at}}</li>
<li>{{ $posts->user_id}}</li>
@endforeach
@else
<h3>You have no posts</h3>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
