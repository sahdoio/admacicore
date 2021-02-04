<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'client_id',
        'date',
        'cover_image_id'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }    

    public function cover_media() {
        return $this->belongsTo(Media::class, 'cover_media_id');
    }

    public function medias() {
        return $this->belongsToMany(Media::class, 'job_media', 'job_id', 'media_id');
    }

    public function jobMedias() {
        return $this->hasMany(JobMedia::class, 'job_id');
    }
}
