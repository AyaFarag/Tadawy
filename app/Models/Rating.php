<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'client_id','rate'
    ];
    public function company()
    {
        return $this->belongsTo(Api\User::class, 'company_id');
    }
    public function client()
    {
        return $this->belongsTo(Api\User::class, 'client_id');
    }

    public function comment()
    {
        return $this->hasOne(Comment::class, 'comment_id');
    }
}
