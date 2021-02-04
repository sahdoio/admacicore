<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    protected $fillable = [
        'name',
        'lastname',
        'about',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Media::class);
    }
}
