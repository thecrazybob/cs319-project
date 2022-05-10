<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int            $id
 * @property int            $user_id
 * @property string         $bilkent_id
 * @property \Carbon\Carbon $birth_date
 * @property string         $gender
 * @property int            $height
 * @property int            $weight
 * @property string         $allergies
 * @property string         $other_illness
 * @property string         $current_medications
 * @property bool           $smoking
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bilkent_id',
        'birth_date',
        'gender',
        'height',
        'weight',
        'allergies',
        'other_illness',
        'operations',
        'current_medications',
        'smoking',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'user_id'    => 'integer',
        'birth_date' => 'date',
        'smoking'    => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patientConditions()
    {
        return $this->belongsToMany(PatientCondition::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
