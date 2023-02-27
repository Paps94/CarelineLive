<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'sim_card_id',
        'network_provider_id'
    ];

    /**
     * Get the Network Provider that owns the number.
     */
    public function networkProvider()
    {
        return $this->belongsTo(NetworkProvider::class);
    }

    /**
     * Get the SIM Card for the phone number.
     */
    public function simCard()
    {
        return $this->belongsTo(SimCard::class);
    }

    /**
     * Get the mobile contract for the phone number.
     */
    public function mobileContract()
    {
        return $this->hasOne(MobileContract::class);
    }
}
