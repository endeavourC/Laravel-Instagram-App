<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = ( auth()->user() ) ? auth()->user()->following->contains($user->id) : false ;

        $postsCount =  $user->posts->count();

        $followersCount =  $user->profile->followers->count();

        $followingCount = $user->following->count();

        return view('profiles.index')->with([
            'user' => $user,
            'follow' => $follows,
            'postsCount' => $postsCount,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount
             ]);
    }
    public function edit(User $user){

        $this->authorize('update', $user->profile);

        return view('profiles.edit')->with('user', $user);

    }
    public function update(User $user){

        $this->authorize('update', $user->profile);


        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);


        if(request('image')){

            // Get and Delete Current Image from Files
            $currentImage = $user->profile->image;
            $currentImagePath = 'public/' . $currentImage;

            Storage::delete($currentImagePath);

            // Set new Image

            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit( 1000, 1000 );
            $image->save();

            $imageArray = [ 'image' => $imagePath ];
        }
        auth()->user()->profile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
        return redirect("/profile/{$user->id}");

    }
}
