<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tests = Test::where('patient_id', $patient_id)->get();

        return view('test.index', compact('tests'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Test $test
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Test $test)
    {
        return view('test.show', compact('test'));
    }
}
