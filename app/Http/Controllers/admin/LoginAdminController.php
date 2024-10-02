<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginAdminController extends Controller
{
public function index(){
    return view("admin.adminLogin");
}


public function authenticate(Request $request)
    {
        
        $validate = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validate->passes()) {
            if (Auth::guard('admin')->attempt(["email" => $request->email, "password" => $request->password])) {
               
                return redirect()->route('admin.dashbord');
            } else {
                return redirect()->route('admin.login')->with("error", "Either email or password is invalid");
            }
        } else {
            return redirect()->route('admin.login')->withErrors($validate)->withInput();
        }
    }
}