<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_admin' => 1])) {
            return redirect(route('admin.homepage'));
        } else if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_admin' => 0])) {
            return redirect(route('santri.homepage'));
        }
        return redirect('/')->with('invalid', 'Email atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('logout'))->with('logout', 'Berhasil keluar');
    }
}
