<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logincontroller extends Controller
{

    public function  __construct()
    {
        $this->middleware('guest');
    }

    public  function index()
    {

        return view('auth.login');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'email'=>'required:unique',
            'password'=>'required:confirmed'
        ]);

        if (auth()->attempt($request->only('email','password'),$request->remember))
        {
            return redirect('/dashboard');

        }else{
            return back()->with('status','Invalid login or password details');
        }



    }
}
