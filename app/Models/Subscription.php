<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = "subscriptions";

    protected $fillable = [
        'approve','status','company_id','plan_id'
    ];

    public function user()
    {
       return $this->belongsto('App\Models\Api\User', 'company_id');
    }

    public function plan()
    {
        return $this->belongsto('App\Models\Plan', 'plan_id');
    }
}
