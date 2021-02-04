<?php

namespace App\Models;

use App\Models\LetterTemplate;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    const SINGLE = 1;
    const MARRIED = 2;

    protected $fillable = [
        'name',
        'lastname',
        'jobtitle',
        'address_id',
        'contact_id',
        'media_id',
        'letter_template_id',
        'rg',
        'cpf',
        'birth_date',
        'ministerial_function',
        'baptism_date',
        'civil_status',
        'father_name',
        'mother_name',
        'birth_city',
        'nationality'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function letterTemplate()
    {
        return $this->belongsTo(LetterTemplate::class);
    }

    public function getBirthDateAttribute($value)
    {
        if (!empty($value)) {
            $array_date = explode('-', $value);
            $day = $array_date[2];
            $month = $array_date[1];
            $year = $array_date[0];
            $date = "$day/$month/$year";
        } else {
            $date = "";
        }

        return $date;
    }

    public function setBirthDateAttribute($value)
    {
        if (!empty($value)) {
            $array_date = explode('/', $value);
            $day = $array_date[0];
            $month = $array_date[1];
            $year = $array_date[2];
            $date = "$year-$month-$day";

            $this->attributes['birth_date'] = $date;
        } else {
            $this->attributes['birth_date'] = null;
        }
    }

    public function getBaptismDateAttribute($value)
    {
        if (!empty($value)) {
            $array_date = explode('-', $value);
            $day = $array_date[2];
            $month = $array_date[1];
            $year = $array_date[0];
            $date = "$day/$month/$year";
        } else {
            $date = "";
        }

        return $date;
    }

    public function setBaptismDateAttribute($value)
    {
        if (!empty($value)) {
            $array_date = explode('/', $value);
            $day = $array_date[0];
            $month = $array_date[1];
            $year = $array_date[2];
            $date = "$year-$month-$day";

            $this->attributes['baptism_date'] = $date;
        } else {
            $this->attributes['baptism_date'] = null;
        }
    }

    public static function getLetterHtml(Member $member)
    {
        $html = $member->letterTemplate->html;

        $value = str_replace('##nome##', strtoupper($member->name), $html);

        $value = str_replace('##sobrenome##', strtoupper($member->lastname), $value);

        $value = str_replace('##rg##', strtoupper($member->rg), $value);

        $value = str_replace('##cpf##', strtoupper($member->cpf), $value);

        $value = str_replace('##data_nascimento##', strtoupper($member->birth_date), $value);

        $date = "Manaus, " . date('d') . " de " . date('M') . " de " . date('Y');
        $value = str_replace('##cidade_data##', $date, $value);

        return $value;
    }
}
