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
    public function index($id)
    {
        $user_auth = Auth::user();

        $transactions = Transaction::where('student_id', $id)->get();
        return view('example.transaction_history', compact(["transactions", "user_auth"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        return view('example.transaction_form', compact("student"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //Validation
        $request->validate([
            'proof' => 'required|max:50'
        ]);

        $student = Student::find($id);

        $transaction = new Transaction([
            'transaction_invoice' => $request->invoice,
            'transaction_fee' => $request->fee,
            'transaction_proof' => $request->proof,
            'transaction_status' => 'Unconfirmed'
        ]);
        $student->transaction()->save($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionModel  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $user_auth = Auth::user();
        return view('example.detail_transaction', compact(['transaction', 'user_auth']));
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
