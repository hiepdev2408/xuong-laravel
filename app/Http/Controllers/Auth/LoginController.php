<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
   public function showFormLogin(){
       return view('auth.login');
   }
   public function login(Request $request){
       $loginCheckAdmin = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

        if (Auth::attempt($loginCheckAdmin)) {
            $request->session()->regenerate();
            // if(Auth::user()->isAdmin()){
            //     return redirect('/admin');
            // }
            return redirect()->intended('/home');
        }
       return back()->withErrors([
           'email'=>'email không tồn tại'
       ])->onlyInput('email');
   }
   public function logout(Request $request){
       Auth::logout();

       $request->session()->invalidate();
       // Xóa tất cả các session() còn hoạt động

       return redirect('/');
   }

}
