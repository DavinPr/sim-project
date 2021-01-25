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

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nameInput' => 'required',
            'placeBirthInput' => 'required',
            'dateBirthInput' => 'required',
            'genderInput' => 'required'
        ]);

        $date_now = date('y-m-d-H-i');
        $second_now = date('s');
        $unique_value = str_replace(["-", "0"], "", $date_now) . $second_now;

        $img_name = null;
        if ($request->hasFile('avatar')) {
            $img_name = "avatar_$user->id" . "$unique_value." . $request->avatar->extension();
            $request->file('avatar')->storeAs('public/avatar', $img_name);
        }
        // Update data user for login
        $user->person
            ->update([
                'person_name' => $request->nameInput,
                'person_birthplace' => $request->placeBirthInput,
                'person_birthdate' => $request->dateBirthInput,
                'person_avatar' => $img_name,
                'person_gender' => $request->genderInput
            ]);



        if ($user->is_admin == 1) {
            return redirect(route('admin.account.detail'))->with('status', 'Data Berhasil Diubah!');
        }
        return redirect(route('santri.account.detail'))->with('status', 'Data Berhasil Diubah!');
    }
}
