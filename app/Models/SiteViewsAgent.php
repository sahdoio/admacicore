<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteViewsAgent extends Model
{
    protected $table = 'siteviews_agent';

    protected $fillable = [
        'agent_name',
        'agent_views',
        'agent_lastview'
    ];
}
