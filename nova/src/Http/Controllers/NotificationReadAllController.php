<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NotificationRequest;
use Laravel\Nova\Notifications\Notification;

class NotificationReadAllController extends Controller
{
    /**
     * Mark the given notification as read.
     *
     * @param  \Laravel\Nova\Http\Requests\NotificationRequest  $request
     * @param  \Laravel\Nova\Notifications\Notification  $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(NotificationRequest $request, Notification $notification)
    {
        $notifications = $request->notifications();
        $notifications->each->update(['read_at' => now()]);

        return response()->json();
    }
}
