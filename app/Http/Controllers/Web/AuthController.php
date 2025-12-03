<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('pages.auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'nipp' => 'required|string|min:4',
            'password' => 'required'
        ]);

        // Do authorization
        if(Auth::attempt($credentials)){
            return redirect('/dashboard');
        }

        return back()->withErrors(['NIPP atau Password Anda tidak valid!'])->withInput($credentials);
    }

    public function logout(Request $request){
        if(Auth::check()) Auth::logout();
        $request->session()->regenerate();
        return redirect('/login')->with('success', 'Berhasil mengeluarkan dari sistem.');
    }
}
