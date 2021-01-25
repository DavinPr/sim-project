<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function santri_home()
    {
        $student = Auth::user()->person->student;
        return view('santri.welcome_santri', compact(['student']));
    }

    public function admin_home()
    {
        $user = Auth::user();
        $transactions = Transaction::where('transaction_status', 'Belum diverifikasi')->get();
        return view('admin.welcome_admin', compact(['user', 'transactions']));
    }

    public function admin_add_santri()
    {
        $user = Auth::user();
        return view('admin.add_data_santri_example', compact('user'));
    }

    public function admin_add_admin()
    {
        $user = Auth::user();
        return view('admin.add_data_admin_example', compact('user'));
    }
}
