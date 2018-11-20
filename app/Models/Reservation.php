<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id','company_id', 'name', 'email', 'phone', 'comment', 'status','date','time'
    ];

    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_PENDING_TEXT = 'pending';
    const STATUS_APPROVED_TEXT = 'approved';

    public function user()
    {
        return $this->belongsTo(Api\User::class, 'user_id');
    }
    public function company()
    {
        return $this->belongsTo(Api\User::class, 'company_id');
    }
}
