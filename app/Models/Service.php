<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'icon',
        'image'
    ];
}
