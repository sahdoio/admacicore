<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class LetterTemplate extends Model
{
    protected $table = 'letter_templates';

    protected $fillable = [
        'html'
    ];
}
