<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    protected $fillable = [
        'post_id',
        'url',
        'url_thumbnail',
        'type',
        'order',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getFullUrlAttribute(): string
    {
        return asset('storage/' . $this->url);
    }

    public function getThumbnailUrlAttribute(): string
    {
        return $this->url_thumbnail
            ? asset('storage/' . $this->url_thumbnail)
            : $this->full_url;
    }
}
