<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','description','country_id','city_id','category_id',
        'specialization_id','confirmation_code', 'status','api_token', 'device_token'
    ];
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
        return $this->hasMany(Ad::class);
    }

    public function meta()
    {
        return $this->hasOne(CompanyMetaData::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function workDay()
    {
        return $this->hasMany(WorkDay::class);
    }
    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

}
