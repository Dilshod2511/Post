<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistertController extends Controller
{
    public function  __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.register');
    }
    public  function store(Request $request)
    {

         $data=$request->validate([
             'name'=>'required|max:255',

             'email'=>'required:unique',
             'password'=>'required:confirmed'

         ]);



            $user=new User();
            $user->name=$data['name'];
            $user->email=$data['email'];
            $user->password=Hash::make($data['password']);
            $user->save();



            auth()->attempt($request->only('email','password'));
        return redirect('/dashboard');


    }
}
