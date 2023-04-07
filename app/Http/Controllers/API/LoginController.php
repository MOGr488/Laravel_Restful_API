<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
     /**
     * Initaiate a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }


    public function login()
    {
        $accessToken = Auth::user()->createToken('Access Token')->accessToken;


        return response()->json([
            'user' => new UserResource(Auth::user()),
            'access_token' => $accessToken
        ]);

    

    }



}
