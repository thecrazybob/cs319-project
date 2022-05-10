<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $announcements = Announcement::all();

        return view('announcement.index', compact('announcements'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Announcement $announcement
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Announcement $announcement)
    {
        $title = $announcement->title;
        $description = $announcement->description;
        $announcement_date = $announcement->announcement_date;

        return view('announcement.show', compact('title', 'description', 'announcement_date'));
    }
}
