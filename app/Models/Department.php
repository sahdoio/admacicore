<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'description',
        'media_id'
    ];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
