<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;


class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }
    public function login(){
        $Accesstoken = Auth::user()->createToken('Access Token')->accessToken;
        return response(['User' => new UserResource(Auth::user()), 'Access Token'=>$Accesstoken]);
    }
}
