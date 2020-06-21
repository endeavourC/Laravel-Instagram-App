@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-3">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="width:70%; " alt="">
        </div>
        <div class="col-9 ">
            <div class="d-flex align-items-center mb-4">
                <h3 class="my-0">{{$user->username}}</h3>
               @cannot('update', $user->profile)
                    <follow-button user-id="{{$user->id}}" follows="{{$follow}}"></follow-button>
               @endcannot
              @can('update', $user->profile)
                <a href="/p/create" class="ml-3 pt-2" >Add new Post</a>   
              @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{$postsCount}}</strong> posts</div>
                <follow-counter user-id="{{$user->id}}"></follow-counter>
                <div class="pr-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach ($user->posts as $post)
            <div class="col-4 pt-4">
                <a href="/p/{{$post->id}}">
                    <img class="w-100" src="{{asset('/storage/'.$post->image)}}" alt="{{$post->caption}}">
                </a>
                {{-- <small class="py-2 d-block muted text-center">{{$post->caption}}</small> --}}
            </div>
        @endforeach
    </div>
</div>
@endsection
