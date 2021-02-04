<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'media_id',
        'title',
        'body'
    ];

    protected $months = [
        1 => 'janeiro',
        2 => 'fevereiro',
        3 => 'março',
        4 => 'abril',
        5 => 'maio',
        6 => 'junho',
        7 => 'julho',
        8 => 'agosto',
        9 => 'setembro',
        10 => 'outubro',
        11 => 'novembro',
        12 => 'dezembro',
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function media() {
        return $this->belongsTo(Media::class);
    }

    public function getDay()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d');
    }

    public function getMonth($small = false, $toUpperCase = false)
    {
        $month_number = intval(\Carbon\Carbon::parse($this->created_at)->format('m'));
        $month = $this->months[$month_number];

        if ($toUpperCase) $month = strtoupper($month);

        if ($small) return str_limit($month, 3, '');

        return $month;
    }
}
