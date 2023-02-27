<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileContract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'network_provider_id',
        'sim_card_id',
        'phone_number_id',
        'duration',
        'exipres'
    ];

    /**
     * Get the user that owns the contract.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the network provider that has the contract.
     */
    public function networkProvider()
    {
        return $this->belongsTo(NetworkProvider::class);
    }

    /**
     * Get the Sim Card that is on the contract.
     */
    public function simCard()
    {
        return $this->BelongsTo(SimCard::class);
    }

    /**
     * Get the phone number that is on the contract.
     */
    public function phoneNumber()
    {
        return $this->BelongsTo(PhoneNumber::class);
    }
}
