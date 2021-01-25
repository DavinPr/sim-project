<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function adminIndex()
    {
        $user = Auth::user();
        return view('admin.account', compact('user'));
    }

    public function santriIndex()
    {
        $user = Auth::user();
        return view('santri.account', compact('user'));
    }
}
