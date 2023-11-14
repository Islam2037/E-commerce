<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthCotnroller extends Controller
{
    public function register(Request $request)
    {
        $vaildator=Validator::make($request->all(),[
            "name"=>"required|string",
            "email"=>"required|email",
            "password"=>"required|confirmed|min:8",

        ]);
        if($vaildator->fails())
        {
            return response()->json([
                "errors"=>$vaildator->errors()
            ],301);
        }
        $password=rybcpt($request->password);
        $access_token=Str::random(64);
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$password,
            "access_token"=>$access_token
        ]);
        return response()->json([
            "sucsess"=>"register is succsessfuly",
            "access_token"=>$access_token
        ],201);

    }

    public function login(Request $request)
    {
        //validation,check,update access_token,return
        $vaildator=Validator::make($request->all(),[
            "email"=>"required|email",
            "password"=>"required|min:8"
        ]);
        if($vaildator->fails())
        {
            return response()->json([
                "errors"=>$vaildator->errors()
            ]);
        }
        $user=User::where("email",$request->email)->first();
        if($user!==null)
        {
            $is_verifed=Hash::check($request->password,$user->password);
            if($is_verifed)
            {
                $access_token=Str::random(64);
                $user->update([
                    "access_token"=>$access_token
                ]);
                return response()->json([
                    "succsess"=>"you logeed in succsessfull",
                    "access_token"=>$access_token
                ],200);
            }
            else
            {
                return response()->json([
                    "msg"=>"email or password not correct"
                ],404);

            }

        }
        else
        {
            return response()->json([
                "msg"=>"email not exist"
            ],404);
        }


    }
    public function logout(Request $request)
    {
        //get access_token,check,update
        $access_token=$request->header("access_token");
        if($access_token!==null)
        {
           $user= User::where('access_token','=',$access_token)->first();
           if($user!==null)
           {
            $user->update([
                'access_token'=>null
            ]);
            return response()->json([
                "succsess"=>"you loggd out sucssessfully "
            ],201);
           }
           else
           {
            return response()->json([
                "msg"=>"access_token not correct"
            ],301);
           }

        }
        else
        {
            return response()->json([
                "msg"=>"access_token not found"
            ],404);
        }
    }
}
