<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan',
        'amount',
        'payment_reference',
        'starts_at',
        'ends_at',
    ];

    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    // Relationship: A subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper: Check if subscription is active
    public function isActive()
    {
        return $this->starts_at && $this->ends_at && now()->between($this->starts_at, $this->ends_at);
    }
}
