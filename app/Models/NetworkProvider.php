<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkProvider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provider'
    ];

    /**
     * Get the phone number for this Network Provider.
     */
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    /**
     * Get the SIM cards for this Network Provider.
     */
    public function simCards()
    {
        return $this->hasMany(SimCard::class);
    }

    /**
     * Get the mobile contracts for this Network Provider.
     */
    public function mobileContracts()
    {
        return $this->hasMany(MobileContract::class);
    }
}
