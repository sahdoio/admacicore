<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    const GENERIC = 1;
    const JPG = 2;
    const PNG = 3;
    const GIF = 4;
    const YOUTUBE = 5;
    const VIMEO = 6;
    const MP4 = 7;
    const PDF = 8;
    const DOC = 9;

    protected $table = 'media_types';

    protected $fillable = [
        'name'
    ];
}
