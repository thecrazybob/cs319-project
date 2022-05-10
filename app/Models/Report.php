<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int            $id
 * @property int            $patient_id
 * @property int            $doctor_id
 * @property string         $subject
 * @property int            $days
 * @property \Carbon\Carbon $report_date
 * @property string         $report_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'file_id',
        'subject',
        'days',
        'report_date',
        'report_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'patient_id'  => 'integer',
        'doctor_id'   => 'integer',
        'file_id'     => 'integer',
        'report_date' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
