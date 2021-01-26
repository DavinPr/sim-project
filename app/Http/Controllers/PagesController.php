<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function santri_home()
    {
        $user = Auth::user();
        $student = Auth::user()->person->student;
        $transactions = Transaction::where('student_id', $user->person->student->id)->orderBy('created_at', 'desc')->get();
        return view('santri.welcome_santri', compact(['student', 'user', 'transactions']));
    }

    public function admin_home()
    {
        $user = Auth::user();
        $transactions = Transaction::where('transaction_status', 'Belum diverifikasi')->orderBy('created_at', 'desc')->get();
        return view('admin.welcome_admin', compact(['user', 'transactions']));
    }

    public function admin_add_santri()
    {
        $user = Auth::user();
        return view('admin.add_data_santri', compact('user'));
    }

    public function admin_add_admin()
    {
        $user = Auth::user();
        return view('admin.add_data_admin', compact('user'));
    }
}
