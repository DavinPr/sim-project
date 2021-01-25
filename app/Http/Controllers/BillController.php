<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $bills = Bill::where('student_id', $user->person->student->id)
            ->where('bill_status', 'Belum dibayar')
            ->get();
        return view('santri.tagihan', compact(['bills', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return view('admin.tagihan', compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fee' => 'required',
            'category' => 'required'
        ]);

        $students = Student::all();

        $date_now = date('y-m-d-H-i');
        $second_now = date('s');
        $unique_value = str_replace(["-", "0"], "", $date_now) . $second_now;

        foreach ($students as $student) {
            $bill = new Bill([
                'bill_number' => "BL$unique_value$student->id",
                'bill_fee' => $request->fee,
                'bill_category' => $request->category,
                'bill_status' => 'Belum dibayar'
            ]);
            $student->bill()->save($bill);
        }
        return redirect(route('admin.add.bill'))->with('status', 'Tagihan berhasil dikirim!');
    }

    public function report()
    {
        $user = Auth::user();
        $students = Student::all();
        return view('admin.laporan', compact(['user', 'students']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
