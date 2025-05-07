<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $data = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($data)) {
            session()->flash('login_success', 'Anda Berhasil Login');
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()
                ->withErrors(['password' => 'Email atau Password Salah!'])
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('logout_success', 'Anda Berhasil Logout');
        return redirect()->route('login');
    }
}
