<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // =========================
        // 1. CEK INPUT KOSONG
        // =========================
        if (empty($request->nip) || empty($request->password)) {
            return back()->with('error', 'NIPP atau Password tidak terisi');
        }

        // =========================
        // 2. DUMMY USER
        // =========================
        $dummyUser = [
            'nip'      => '12345',
            'password' => 'admin123',
            'role'     => 'admin'
        ];

        // =========================
        // 3. CEK NIP & PASSWORD BENAR / SALAH
        // =========================
        if ($request->nip !== $dummyUser['nip'] || $request->password !== $dummyUser['password']) {
            return back()->with('error', 'NIPP atau Password salah');
        }

        // =========================
        // 4. CEK ROLE ADMIN ATAU BUKAN
        // =========================
        if ($dummyUser['role'] !== 'admin') {
            return back()->with('error', 'NIPP dan Password benar tapi pengguna bukan role Admin');
        }

        // =========================
        // 5. LOGIN BERHASIL
        // =========================
        $request->session()->put('logged_in', true); // simpan session

        // Flash success + flag redirect ke dashboard
        $request->session()->flash('success', 'Login Berhasil!');
        $request->session()->flash('redirect_dashboard', true);

        // Kembali ke login agar popup muncul dulu
        return redirect()->route('login.form');
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // hapus semua session
        return redirect()->route('login.form')->with('success', 'Logout Berhasil');
    }
}
