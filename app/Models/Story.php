<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
    ];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function insights()
    {
        return $this->hasMany(Insight::class);
    }
}
