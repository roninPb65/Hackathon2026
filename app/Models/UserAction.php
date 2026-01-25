<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'action_id', 'event_id', 'reflection', 'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}