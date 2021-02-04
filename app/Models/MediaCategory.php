<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model {

    protected $table = 'media_categories';

    const SITE_INFO = 1;
    const BANNER = 2;
    const JOB = 3;
    const CLIENT = 4;
    const SERVICE = 5;
    const GALLERY = 6;

    protected $fillable = [
        'name'
    ];
}
