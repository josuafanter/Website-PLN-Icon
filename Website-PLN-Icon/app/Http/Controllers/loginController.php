<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\View\View;

class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $akun = $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($akun)) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        
        return redirect()->back()->with('gagal','Password atau email anda salah');
    }

    public function register(Request $request){
        
        $validData=[
            'name' => 'required',
            'email' => 'required|email',
            'gambar' => 'required',
            'password' => 'required',
        ];

        $register = $request -> validate($validData);


        if($request->file('gambar')){
            $register['gambar'] = $request->file('gambar')->store('post-gambar');
         }

        //return $register;

        $register ['password']=Hash::make($register['password']);
        //return $register;
        User::create($register);
        return redirect()->back()->with('berhasil','User berhasil ditambah');
    }

    

    public function daftar(){
        return view('register');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
