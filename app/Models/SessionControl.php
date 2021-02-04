<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionControl extends Model
{
    protected $table = 'session_control';

    protected $fillable = [
        'session',
        'startview',
        'endview',
        'ip',
        'url',
        'agent',
        'agent_name',
    ];
}
