<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'cellphone',
        'cellphone2',
        'phone',
        'phone2',
        'email',
        'email2',
        'skype',
    ];
}
