<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationModel;

class RegistrationController extends Controller
{
    function onRegister(Request $reg){

        $firstname= $reg->input('firstname');
        $lastname= $reg->input('lastname');
        $username= $reg->input('username');
        $password= $reg->input('password');
        $gender= $reg->input('gender');
        $city= $reg->input('city');

        $checkUsername= RegistrationModel::where('username',$username)->count();

        if($checkUsername != 0)
        {
            return "Username Exits";
        }
        else
        {
            $res= RegistrationModel::insert([
                'first_name'=>$firstname,
                'last_name'=>$lastname,
                'username'=>$username,
                'password'=>$password,
                'gender'=>$gender,
                'city'=>$city,
            ]);

            if($res == true){
                return "Registration Successful";
            }
            else
            {
                return "Registration Failed! Try Again";
            }
        }


    }
}
