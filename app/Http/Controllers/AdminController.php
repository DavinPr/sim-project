<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Person;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function studentToAdmin($id)
    {
        User::where('id', $id)
            ->update([
                'is_admin' => 1
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('is_admin', 1)->get();
        return view('admin.show_data_admin_example', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'username' => 'required|max:50',
            'person_name' => 'required|max:50',
            'person_birthdate' => 'required',
            'person_birthplace' => 'required',
            'person_gender' => 'required',
            'password' => 'required|min:6'
        ]);

        //Insert personal data
        $person = new Person([
            'person_name' => $request->person_name,
            'person_birthdate' => $request->person_birthdate,
            'person_birthplace' => $request->person_birthplace,
            'person_gender' => $request->person_gender,
            'person_avatar' => $request->person_avatar
        ]);
        $person->save();

        $person = Person::find($person->id);

        //Insert data user for login
        $user = new User([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'is_admin' => 1
        ]);
        $person->user()->save($user);

        $admin = new Admin();
        $person->admin()->save($admin);

        return redirect(route('admin.show.admin.page'))->with('status', 'Data Admin Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.detail_admin_example', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.update_data_admin_example', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation
        $request->validate([
            'password' => 'required|min:6'
        ]);

        //Update data user
        User::where('id', $id)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        return redirect(route('admin.show.admin.page'))->with('status', 'Data Admin Berhasil Diubah!');
    }

    public function updatePerson(Request $request, $id)
    {
        $request->validate([
            'person_name' => 'required|max:50',
            'person_birthdate' => 'required',
            'person_birthplace' => 'required',
            'person_gender' => 'required'
        ]);

        //Update personal data
        Person::where('id', $id)
            ->update([
                'person_name' => $request->person_name,
                'person_birthdate' => $request->person_birthdate,
                'person_birthplace' => $request->person_birthplace,
                'person_gender' => $request->person_gender,
                'person_avatar' => $request->person_avatar
            ]);
        return redirect(route('admin.show.admin.page'))->with('status', 'Data Admin Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::destroy($id);
        return redirect(route('admin.show.admin.page'))->with('status', 'Data Admin Berhasil Dihapus!');
    }

    public function verifikasi()
    {
        $admin = Auth::user()->person->admin;
        $transactions = Transaction::where('admin_id', $admin->id)->get();
        return view('admin.verifikasi', compact('transactions'));
    }
}
