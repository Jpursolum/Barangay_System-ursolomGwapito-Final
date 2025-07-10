<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    protected $guarded = [];

    protected $casts = [
        'incident_datetime' => 'datetime',
        'persons_involved' => 'array', // JSON data cast to array
        'witnesses' => 'array',        // JSON data cast to array
        'is_resident' => 'boolean',
    ];
}
