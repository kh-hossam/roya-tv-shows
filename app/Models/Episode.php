<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['series_id', 'title', 'description', 'duration', 'airing_time', 'thumbnail', 'video_content'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}
