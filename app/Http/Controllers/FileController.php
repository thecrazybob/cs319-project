<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\File $file
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, File $file)
    {
        return view('file.show', compact('file'));
    }
}
