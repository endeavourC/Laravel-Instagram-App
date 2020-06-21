<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class FollowsController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('index');
        
    }
    public function store(User $user){

        return auth()->user()->following()->toggle($user->profile);
    }

    public function index(User $user){
        return $user->profile->followers->count();
    }
}
