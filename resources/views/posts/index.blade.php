@extends('layouts.app')

@section('content')
    <div class="container">
       @if ($posts->count())
        @foreach ($posts as $post)
        <div class="row">
                <div class="col-6 offset-3">
                <a href="profile/{{$post->user->profile->id}}"><img style="width:100%;" src="{{asset('storage/'.$post->image)}}" alt=""></a>
                </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <p class="py-4 text-center h4">{{$post->caption}}</p>
                <hr>
            </div>
        </div>   
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
       @else 
         <p class="lead">There is no posts.</p>
       @endif
    </div>
@endsection