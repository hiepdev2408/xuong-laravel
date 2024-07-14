<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showFormRegister(){
        return view('auth.register');
    }
    public function register(Request $request)
    {
       $register = $request->validate([
           'name'=> ['required', 'string', 'max:255'],
           'email'=> ['required', 'string', 'email', 'max:255', 'unique:users' ],
           'password'=> ['required', 'string', 'min:5', 'confirmed']
       ]);

       $user = User::query()->create($register);
       $request->session()->regenerate();

       return redirect()->intended('/home');
    }
}

