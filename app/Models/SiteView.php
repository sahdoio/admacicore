<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteView extends Model
{
    protected $table = 'siteviews';

    protected $fillable = [
        'date',
        'users',
        'views',
        'pages'
    ];
}
