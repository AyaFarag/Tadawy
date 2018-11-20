<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'title','duration','documents'
    ];

    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
    
    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
