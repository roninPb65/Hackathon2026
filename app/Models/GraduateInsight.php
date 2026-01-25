<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateInsight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'job_title', 'company', 'success_story',
        'key_actions', 'time_to_hire', 'is_approved'
    ];

    protected $casts = [
        'key_actions' => 'array',
        'is_approved' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
