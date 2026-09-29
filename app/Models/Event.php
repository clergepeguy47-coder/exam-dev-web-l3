<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'location'
    ];

    protected $casts = [
        'event_date' => 'date'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
