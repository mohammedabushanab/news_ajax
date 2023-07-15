<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLogin($guard){
        return response()->view('cms.auth.login' ,compact('guard'));
    }



    public function login(Request $request){
        $validator = validator($request->all(),[
            'email' => 'required|email' ,
            'password' => 'required|string',
        ] , [
            'email.exist' => "Email is Not Found",
        ]);
        $credintial = [
            'email' =>$request->get('email'),
            'password' => $request->get('password'),
            // 'remember' => $request->get('remember'),
        ];
        if(! $validator->fails()){
            if(Auth::guard($request->get('guard'))->attempt($credintial )){
                return response()->json(['icon' => 'success' , 'title' =>'Login Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' =>'Login is Failed'] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }
}
