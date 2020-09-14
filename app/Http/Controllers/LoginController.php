<?php

namespace App\Http\Controllers;
use \Firebase\JWT\JWT;
use App\RegistrationModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function onLogin(Request $req){
        $key = env("TOKENKEY"); 
        $username= $req->input('username');
        $passcode= $req->input('passcode');

        $payload = array(
            "iss" => "http://example.org",
            "user" => $username,
            "iat" => time(),
            "nbf" => time()+3600
        );

        $checkLogin= RegistrationModel::where(['username'=>$username, 'password'=>$passcode])->count();

        if($checkLogin == 1){
            $jwt = JWT::encode($payload, $key);

            return response()->json(['Token'=>$jwt, 'status'=>'Login Success']);
        }
        else{
            return 'Login Failed ! try again';
        }

    }
}
