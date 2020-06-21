@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
               <div class="col-10 offset-2">
                    <h1>Edit profile</h1>
                    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label ">{{ __('Title') }}</label>
               
                                       <input id="title"
                                               type="text" 
                                               class="form-control @error('title') is-invalid @enderror"
                                               name="title" 
                                               value="{{ old('title') ??  $user->profile->title }}" 
                                               required 
                                               autocomplete="title">
               
                                       @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                               </div>
                            <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label ">{{ __('description') }}</label>
               
                                       <input id="description"
                                               type="text" 
                                               class="form-control @error('description') is-invalid @enderror"
                                               name="description" 
                                               value="{{ old('description') ?? $user->profile->description }}" 
                                               required 
                                               autocomplete="description">
               
                                       @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                               </div>
                            <div class="form-group row">
                                    <label for="url" class="col-md-4 col-form-label ">{{ __('url') }}</label>
               
                                       <input id="title"
                                               type="text" 
                                               class="form-control @error('url') is-invalid @enderror"
                                               name="url" 
                                               value="{{ old('url') ?? $user->profile->url }}" 
                                               autocomplete="url">
               
                                       @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                               </div>
                               <div class="row">
                                       <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                       <input type="file" class="form-control-file" id="image" name="image">
                                       @error('image')
                                           <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                               </div>
                               <div class="row pt-5">
                                   <button class="btn btn-primary">Save Profile</button>
                               </div>
                    </form>
               </div>
        </div>
    </div>
@endsection
