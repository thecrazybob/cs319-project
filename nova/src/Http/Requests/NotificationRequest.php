<?php

namespace Laravel\Nova\Http\Requests;

use Laravel\Nova\Notifications\Notification;

class NotificationRequest extends NovaRequest
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection<\Laravel\Nova\Notifications\Notification>
     */
    public function notifications()
    {
        return Notification::whereNotifiableId(
            $this->user()->getKey()
        )->whereNull('read_at')->latest()->get();
    }
}
