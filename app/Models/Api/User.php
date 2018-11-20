<?php

namespace App\Models\Api;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	const CLIENT_ROLE = 'client';
    const COMPANY_ROLE = 'company';
    const CLINICS = 'CLINICS';
    const SPA = 'SPA';
    const HOSPITAL = 'HOSPITAL';
    const FIRM = 'FIRM';
        
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','description','mobile','confirmed_phone','city_id','specialization_id','confirmation_code', 
        'status','api_token', 'device_token','logo'
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function ads()
    {
        return $this->hasMany(\App\Models\Ad::class,'company_id');
    }

    public function meta()
    {
        return $this->hasOne(\App\Models\CompanyMetaData::class, 'company_id');
    }

    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class, 'company_id');
    }
    public function workDays()
    {
        return $this->hasMany(\App\Models\WorkDay::class, 'company_id');
    }

    public function city(){
    	return $this->belongsTo(\App\Models\City::class);
    }

    public function specialization(){
    	return $this->belongsTo(\App\Models\Specialization::class);
    }

    public function clientRatings() {
        return $this->hasMany(\App\Models\Rating::class, 'client_id');
    }

    public function companyRatings() {
        return $this->hasMany(\App\Models\Rating::class, 'company_id');
    }

    public function companyComments() {
        return $this->hasMany(\App\Models\Comment::class, 'company_id');
    }

    public function clientComments() {
        return $this->hasMany(\App\Models\Comment::class, 'client_id');
    }

    public function subscription()
    {
        return $this->hasMany(\App\Models\Subscription::class,'company_id');
    }

    public function UserReservation()
    {
        return $this->hasMany(\App\Models\Reservation::class, 'user_id');
    }
    
    public function CompanyReservation()
    {
        return $this->hasMany(\App\Models\Reservation::class, 'company_id');
    }
    
    public static function getCompanyType(){
        return [
            self::CLINICS => trans('language.clinic'),
            self::SPA => trans('language.spa'),
            self::HOSPITAL => trans('language.hospital'),
            self::FIRM => trans('language.firm'),
        ];
    }
}



