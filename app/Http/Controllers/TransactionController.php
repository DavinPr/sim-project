<?php

namespace App\Http\Controllers;

use App\Bill;
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
        $user = Auth::user();
        return view('santri.show_data_transaksi', compact(['transactions', 'user']));
    }

    public function indexAdmin()
    {
        $transactions = Transaction::where('transaction_status', 'Belum diverifikasi')->get();
        $user = Auth::user();
        return view('admin.show_data_transaksi', compact(['transactions', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bill $bill)
    {
        $user_auth = Auth::user();
        return view('santri.pembayaran', compact("user_auth", 'bill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bill $bill, Request $request)
    {
        //Validation

        $this->validate($request, [
            'fee' => 'required',
            'category' => 'required',
            'proof' => 'mimes:jpg,png,jpeg'
        ]);

        $student = Auth::user()->person->student;

        $date_now = date('y-m-d-H-i');
        $second_now = date('s');
        $unique_value = str_replace(["-", "0"], "", $date_now) . $second_now;

        $img_name = "proof_$student->nis" . "$unique_value.png";
        $request->file('proof')->storeAs('public/proof', $img_name);

        $transaction = new Transaction([
            'bill_id' => $bill->id,
            'transaction_invoice' => "TRX$unique_value$student->id",
            'transaction_fee' => $request->fee,
            'transaction_category' => $request->category,
            'transaction_proof' => $img_name,
            'transaction_status' => 'Belum diverifikasi'
        ]);


        $student->transactions()->save($transaction);
        return redirect(route('santri.pembayaran', $bill))->with('status', 'Pembayaran berhasil diajukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionModel  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $user = Auth::user();
        if ($user->is_admin == 1) {
            return view('admin.detail_transaksi', compact(['transaction', 'user']));
        }
        return view('santri.detail_transaksi', compact(['transaction', 'user']));
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
        $admin = Auth::user()->person->admin->id;

        if ($request->verification == 'Terverifikasi') {
            Bill::where('id', $transaction->bill_id)
                ->update([
                    'bill_status' => 'Lunas'
                ]);
        }

        Transaction::where('id', $transaction->id)
            ->update([
                'admin_id' => $admin,
                'transaction_status' => $request->verification
            ]);
        return redirect(route('admin.detail.transaksi', $transaction))->with('status', "Transaksi berhasil $request->verification");
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
