<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::where('patient_id', auth()->user()->patient_id)->get();

        return view('invoice.index', compact('invoices'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Invoice      $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invoice $invoice)
    {
        return view('invoice.show', compact('invoice'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Invoice $invoice)
    {
        return view('invoice.pay', compact('invoice'));
    }
}
