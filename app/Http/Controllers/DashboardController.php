<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('private', false)->get();

        return view('dashboard', compact('announcements'));
    }
}
