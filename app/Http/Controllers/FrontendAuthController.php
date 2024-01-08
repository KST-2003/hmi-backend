<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontendAuthController extends Controller
{
    public function index() {
        return view('login.frontendLogIn');
    }

    public function logIn(Request $request)
    {

        $this->validate($request,[
            'email' => 'required',
            'password' => ['required', 'min:6']
        ]);

        $credentials = $request->except('_token');

        if ( Auth::attempt($credentials))
        {
            if(Auth::user()->teacher_id != null || Auth::user()->student_id != null)
            {
                Session::flush();
                Auth::logout();
                return redirect()->route('frontend#login')->with(['credential'=>'This credential did not match']);
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return redirect()->route('frontend#login')->with(['credential'=>'This credential did not match']);
        }

    }

    public function logout()
    {
        // dd('logout');
        Session::flush();
        Auth::logout();
        return redirect()->route('frontend#login');
    }
}
