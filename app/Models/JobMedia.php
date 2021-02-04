<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobMedia extends Model
{   
    protected $table = 'job_media';
    
    protected $fillable = [
        'job_id',
        'media_id',
        'position'
    ];

    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function media() {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
