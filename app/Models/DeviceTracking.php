<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTracking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'device_id',
        'active'
    ];

    /**
     * Get the device that this tracking belongs to.
     */
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    /**
    * Get the user that this tracking belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
