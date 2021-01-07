<?php

namespace App\Http\Controllers;

use App\Student;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Auth::user()->person->student->transactions;
        return view('santri.show_data_transaksi', compact('transactions'));
    }

    public function indexAdmin()
    {
        $transactions = Transaction::where('transaction_status', 'Belum diverifikasi')->get();
        return view('admin.show_data_transaksi', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_auth = Auth::user();

        return view('santri.pembayaran', compact("user_auth"));
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

        $student = Auth::user()->person->student;

        $date_now = date('y-m-d-H-i');
        $second_now = date('s');
        $unique_value = str_replace(["-", "0"], "", $date_now) . $second_now;
        $transaction = new Transaction([
            'transaction_invoice' => "TRX" . $unique_value . $student->nis,
            'transaction_fee' => $request->fee,
            'transaction_category' => $request->category,
            'transaction_status' => 'Belum diverifikasi'
        ]);
        $student->transactions()->save($transaction);
        return redirect(route('santri.pembayaran'))->with('status', 'Pembayaran berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionModel  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionModel  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
