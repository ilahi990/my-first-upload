<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //this will show the login page
    public function login()
    {
        return view("login.login");
    }
    public function authenticate(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validate->passes()) {
            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
               
                return redirect()->route('login.dashboard');
            } else {
                return redirect()->route('login.signup')->with("error", "Either email or password is invalid");
            }
        } else {
            return redirect()->route('login.signup')->withErrors($validate)->withInput();
        }
    }

    public function logout(){
        Auth::logout(); 
        return redirect()->route('login.signup')->with('success','logged out successfully');
    }

}