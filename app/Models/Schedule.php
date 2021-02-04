<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY = 7;

    const WEEK_MAP = [
        self::MONDAY => 'segunda-feira',
        self::TUESDAY => 'terça-feira',
        self::WEDNESDAY => 'quarta-feira',
        self::THURSDAY => 'quinta-feira',
        self::FRIDAY => 'sexta-feira',
        self::SATURDAY => 'sábado',
        self::SUNDAY => 'domingo'
    ];

    protected $fillable = [
        'name',
        'week_day',
        'time_start',
        'time_end'
    ];

    /**
     * @param $week_day
     * @return mixed
     */
    public static function weekDay($week_day)
    {
        if (!$week_day) return 'Não encontrado';

        return self::WEEK_MAP[$week_day];
    }

    /**
     * @param $value
     * @return string
     */
    public function getTimeStartAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    /**
     * @param $value
     * @return string
     */
    public function getTimeEndAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }
}
