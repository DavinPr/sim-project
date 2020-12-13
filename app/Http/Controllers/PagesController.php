<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function santri_home()
    {
        $student = Auth::user()->person->student;
        return view('santri.welcome_santri', compact('student'));
    }

    public function admin_home()
    {
        $admin = Auth::user()->person;
        return view('admin.welcome_admin', compact('admin'));
    }

    public function admin_add_santri()
    {
        return view('admin.add_data_santri_example');
    }

    public function admin_add_admin()
    {
        return view('admin.add_data_admin_example');
    }
}
