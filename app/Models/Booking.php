<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'service_id',
    'title',
    'date',
    'status',
    'address',
    'phone',
    'finished_at',
    'warranty_expires_at',
    ];

    protected $casts = [
        'finished_at' => 'datetime',
        'warranty_expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
