<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category', 'impact_score'];

    public function userActions()
    {
        return $this->hasMany(UserAction::class);
    }
}
