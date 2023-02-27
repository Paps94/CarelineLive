<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'serial_number',
        'imei',
        'manufacturer',
        'model',
        'operating_system',
        'deactivated'
    ];

    /**
     * Get the user that owns the device.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tracking history for the device.
     */
    public function deviceTrackings()
    {
        return $this->hasMany(DeviceTracking::class);
    }
}
