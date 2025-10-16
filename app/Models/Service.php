<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    /**
     * Relasi: Satu service bisa dipakai oleh banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
