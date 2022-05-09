<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('private', false)->take(3)->latest('announcement_date')->get();

        return view('dashboard', compact('announcements'));
    }
}
