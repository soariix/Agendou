<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'tenant_id',
        'nome',
        'duration_minutes',
        'preço',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
