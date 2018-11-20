<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    const DURATION_ONE_DAY_VALUE = 'DAY';
    const DURATION_ONE_WEEK_VALUE = 'WEEK';
    const DURATION_ONE_MONTH_VALUE = 'MONTH';
    const DURATION_SIX_MONTHES_VALUE = 'SIXMONTHES';
    const DURATION_ONE_YEAR_VALUE = 'YEAR';
    public static $durations = [
        self::DURATION_ONE_DAY_VALUE => 'يوم',
        self::DURATION_ONE_WEEK_VALUE => 'اسبوع',
        self::DURATION_ONE_MONTH_VALUE => 'شهر',
        self::DURATION_SIX_MONTHES_VALUE => '6 شهور',
        self::DURATION_ONE_YEAR_VALUE => 'سنة'
    ];

    public static $durationsValues = [
        self::DURATION_ONE_DAY_VALUE => '+1 day',
        self::DURATION_ONE_WEEK_VALUE => '+1 week',
        self::DURATION_ONE_MONTH_VALUE => '+1 month',
        self::DURATION_SIX_MONTHES_VALUE => '+6 months',
        self::DURATION_ONE_YEAR_VALUE => '+1 year'
    ];

    protected $fillable = ['title', 'content', 'city_id', 'company_id', 'duration', 'image', 'status'
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function company()
    {
        return $this->belongsTo(Api\User::class);
    }
}
