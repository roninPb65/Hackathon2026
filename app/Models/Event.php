<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'event_type',
        'url', 'event_date', 'location', 'is_online', 'is_approved'
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_online' => 'boolean',
        'is_approved' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'event_registrations')
                    ->withTimestamps()
                    ->withPivot('registered_at');
    }
}