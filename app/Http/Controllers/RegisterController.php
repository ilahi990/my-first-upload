<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //this will show register page
    public function register(){
        return view('login.register');
    }
    // this will register the user
    public function registeration(Request $request){
        $valiadate = Validator::make(request()->all(), [
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        if ($valiadate->passes()) {
           
            
          $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password" =>Hash::make($request->password),
            "role" => 'user',
          ]);

          return redirect()->route('login.signup')->with('success', 'you have registered successfully.');


        } else {
            return redirect()->route('login.register')->withErrors($valiadate)->withInput();
        }
}









}
