<?php

namespace Laravel\Nova\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Nova\Http\Requests\NotificationRequest;

class NotificationIndexController extends Controller
{
    /**
     * Return the details for the Dashboard.
     *
     * @param  \Laravel\Nova\Http\Requests\NotificationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(NotificationRequest $request)
    {
        $notifications = $request->notifications();

        return response()->json([
            'notifications' => $notifications,
            'unread' => $notifications->count() > 0,
        ]);
    }
}
