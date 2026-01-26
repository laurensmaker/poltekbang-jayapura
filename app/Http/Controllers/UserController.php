<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }



    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dasbor');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function index(){
        $user = User::all();
        return view('user.index', compact('user'));
    }

   public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); 

        return redirect('/')->with('success', 'Berhasil logout');
    }

}
