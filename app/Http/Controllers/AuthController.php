<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('inscription');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'devise' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'devise' => $request->devise
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function showLoginForm(){
        return view('connexion');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('index');
        }

        return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');  
    }

}
