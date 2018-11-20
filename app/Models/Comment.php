<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'client_id','comment'
    ];
    public function company()
    {
        return $this->belongsTo(Api\User::class, 'company_id');
    }
    public function client()
    {
        return $this->belongsTo(Api\User::class, 'client_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'comment_id');
    }
}
