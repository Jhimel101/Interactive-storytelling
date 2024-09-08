<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'content',
        'description',
        'next_story_id',  // Optional: if a choice leads to another story
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function insights()
    {
        return $this->hasMany(Insight::class);
    }
}
