<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'event_id', 'type', 'price', 'quantity_available'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
