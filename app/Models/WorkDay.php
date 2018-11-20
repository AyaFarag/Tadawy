<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'from','to','shift','company_id'
    ];
    protected $table = 'workdays';
    public function company()
    {
        return $this->belongsTo(Api\User::class);
    }
}
