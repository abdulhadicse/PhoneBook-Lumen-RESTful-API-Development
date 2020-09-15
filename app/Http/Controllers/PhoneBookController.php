<?php

namespace App\Http\Controllers;
use \Firebase\JWT\JWT;
use App\PhoneBookModel;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    function onInsert(Request $req){

        $token= $req->input('token');
        $key= env('TOKENKEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decodeArray= (array) $decoded;
        
        $user= $decodeArray['user'];
        $one= $req->input('one');
        $two= $req->input('two');
        $name= $req->input('name');
        $email= $req->input('email');

        $res= PhoneBookModel::insert([
            'username'=>$user,
            'phone_number_one'=>$one,
            'phone_number_two'=>$two,
            'name'=>$name,
            'email'=>$email
        ]);

        if($res == true){
            return "Save Successful";
        }
        else
        {
            return "Failed! Try Again";
        }


    }


    function onSelect(Request $req){

        $token= $req->input('token');
        $key= env('TOKENKEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decodeArray= (array) $decoded;
        
        $user= $decodeArray['user'];
        

        $res= PhoneBookModel::where('username', $user)->get();

        return $res;


    }

    function onDelete(Request $req){

        $token= $req->input('token');
        $key= env('TOKENKEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decodeArray= (array) $decoded;
        
        $user= $decodeArray['user'];
        

        $res= PhoneBookModel::where('username', $user)->delete();

        if($res == true){
            return "Delete Successful";
        }
        else
        {
            return "Failed! Try Again";
        }


    }

    function onUpdate(Request $req){

        $token= $req->input('token');
        $key= env('TOKENKEY');
        $decoded = JWT::decode($token, $key, array('HS256'));
        $decodeArray= (array) $decoded;
        
        $user= $decodeArray['user'];
        $one= $req->input('one');
        $two= $req->input('two');
        $name= $req->input('name');
        $email= $req->input('email');

        $res= PhoneBookModel::where('username', $user)->update([
            'username'=>$user,
            'phone_number_one'=>$one,
            'phone_number_two'=>$two,
            'name'=>$name,
            'email'=>$email
        ]);

        if($res == true){
            return "Update Successful";
        }
        else
        {
            return "Failed! Try Again";
        }


    }
}
