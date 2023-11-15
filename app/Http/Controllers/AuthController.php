<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(){
        return view('Auth.registration');
    }

    public function login(){
        return view('Auth.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->with('error','Login details are not valid.');
    }

    public function registrationPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>['required','email','unique:users'],
            'password' => ['required', 'min:6'],
        ]);

        $data["name"] = $request->name;
        $data["email"] = $request->email;
        $data["password"] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with('error','Registration failed, please try again.');
        }

        return redirect(route('login'))->with('success','Registration success , now please login');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    
}
