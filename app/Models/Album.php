<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    const TYPE_IMAGE = 1;
    const TYPE_VIDEO = 2;

    protected $fillable = [
        'name',
        'description',
        'type',
        'cover_media_id'
    ];

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'album_media');
    }

    public function cover_media()
    {
        return $this->belongsTo(Media::class);
    }
}
