<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','address','images','company_id'
    ];

    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function company()
    {
        return $this->belongsTo(Api\User::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array'
    ];
}
