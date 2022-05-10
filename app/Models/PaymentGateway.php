<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int            $id
 * @property string         $gateway_name
 * @property bool           $enabled
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class PaymentGateway extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gateway_name',
        'enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'enabled' => 'boolean',
    ];
}
