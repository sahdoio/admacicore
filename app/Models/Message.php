<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'email_from',
        'email_to',
        'subject',
        'message',
        'date',
    ];
}
