<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'iccid',
        'network_provider_id'
    ];

    /**
     * Get the Network Provider that owns the SIM card.
     */
    public function networkProvider()
    {
        return $this->belongsTo(NetworkProvider::class);
    }

    /**
     * Get the phone number for the SIM card.
     */
    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class);
    }

    /**
     * Get the mobile conract for this Sim Card.
     */
    public function mobileContract()
    {
        return $this->hasOne(MobileContract::class);
    }
}
