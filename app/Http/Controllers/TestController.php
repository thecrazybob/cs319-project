<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('test.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Test         $test
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Test $test)
    {
        $this->authorize('view', $test);
        $file_path = $test->file->file_path;

        return response()->download(storage_path('app/public/'.$file_path));
    }
}
