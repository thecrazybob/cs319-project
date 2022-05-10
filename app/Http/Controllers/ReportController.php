<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('report.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Report       $report
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Report $report)
    {
        $this->authorize('view', $report);
        $file_path = $report->file->file_path;

        return response()->download(storage_path('app/public/'.$file_path));
    }
}
