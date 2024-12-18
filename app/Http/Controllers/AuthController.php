<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        $title = "Sign In";
        return view("auth.login",compact('title'));
    }

    public function loginProcess(Request $request){
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (!auth()->attempt($credentials,$request->remember)) {
            return redirect()->back()->withErrors(["error" => "Invalid credentials, please check again!"]);
        }else{
            if (auth()->user()->role == "ADM") {
                return redirect(route('disease.index'));
            }
        }
    }

    public function logout(){
        auth()->logout();
        return redirect(route('login'))->with('success','Berhasil keluar');
    }
}
