<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::where('patient_id', $patient_id)->get();

        return view('transaction.index', compact('transactions'));
    }

    /**
     * @param \App\Http\Requests\TransactionStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return redirect()->route('transaction.index');
    }

    /**
     * @param \App\Http\Requests\TransactionUpdateRequest $request
     * @param \App\Models\Transaction                     $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return redirect()->route('transaction.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction  $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
