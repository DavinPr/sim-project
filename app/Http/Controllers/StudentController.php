<?php

namespace App\Http\Controllers;

use App\Person;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $user_auth = Auth::user();
        if (Auth::user()->is_admin) {
            return view('admin.show_data_santri_example', compact(["students", "user_auth"]));
        }
        return view('santri.show_data_santri_example', compact(["students", "user_auth"]));
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
            'nis' => 'required|max:50',
            'person_name' => 'required|max:50',
            'person_birthdate' => 'required',
            'person_birthplace' => 'required',
            'person_gender' => 'required',
            'password' => 'required|min:6',
            'spp' => 'required'
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
            'username' => $request->nis,
            'password' => bcrypt($request->password),
            'is_admin' => 0
        ]);
        $person->user()->save($user);

        //Insert data student
        $student = new Student([
            'nis' => $request->nis,
            'spp' => $request->spp
        ]);
        $person->student()->save($student);

        return redirect(route('admin.show.santri.page'))->with('status', 'Data Santri Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $user_auth = Auth::user();
        if (Auth::user()->is_admin) {
            return view('admin.detail_santri_example', compact(["student", "user_auth"]));
        }
        return view('santri.detail_santri_example', compact(["student", "user_auth"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $user = Auth::user();
        return view('admin.update_data_santri_example', compact(['student', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //Validation
        $request->validate([
            'spp' => 'required'
        ]);

        //Update data student
        Student::where('id', $student->id)
            ->update([
                'spp' => $request->spp
            ]);
        return redirect(route('admin.show.santri.page'))->with('status', 'Data Santri Berhasil Diubah!');
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

        return redirect('/santri/show')->with('status', 'Data Santri Berhasil Diubah!');
    }

    public function updateUser(Request $request, $id)
    {
        //Validation
        $request->validate([
            'password' => 'required|min:6'
        ]);

        //Update data user for login
        User::where('id', $id)
            ->update([
                'password' => bcrypt($request->password)
            ]);

        return redirect('/santri/show')->with('status', 'Data Santri Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Person::destroy($student->person->id);
        return redirect('/santri/show')->with('status', 'Data Santri Berhasil Dihapus!');
    }

    public function profile()
    {
        $user_auth = Auth::user();
        if (Auth::user()->is_admin) {
            return view('admin.detail_santri_example');
        }
        return view('santri.profile');
    }
}
