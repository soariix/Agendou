<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'professional_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function professional()
    {
        return $this->belongsTo(Profissional::class);
    }
}
