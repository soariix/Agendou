<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'tenant_id',
        'client_id',
        'professional_id',
        'service_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function professional()
    {
        return $this->belongsTo(Profissional::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
