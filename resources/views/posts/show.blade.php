@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img style="width:100%;" src="{{asset('storage/'.$post->image)}}" alt="">
            </div>
            <div class="col-4">
                <div>
                   <div class="d-flex align-items-center">
                       <div class="pr-3">
                        <img src="{{$post->user->profile->profileImage()}}" class="w-100 rounded-circle" style="max-width:40px;" alt=""> 
                       </div>
                       <div>
                            <div class="my-0 font-weight-bold"><a  class="text-dark" href="/profile/{{$post->user->profile->id}}">{{$post->user->username}}</a>
                                <a class="ml-4" href="#">Follow</a>
                            </div>
                       </div>
                   </div>
                   <hr>
                    <p>{{$post->caption}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection