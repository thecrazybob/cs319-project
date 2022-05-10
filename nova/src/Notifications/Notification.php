<?php

namespace Laravel\Nova\Notifications;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'nova_notifications';

    protected $guarded = [];

    public $incrementing = false;

    public $casts = [
        'data' => 'array',
    ];
}
