<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'social_network','email','phone','address'
    ];

    protected $casts = [
        'social_network' => 'array',
    ];

    public function setSocialNetworkAttribute($value)
    {
        $this->attributes['social_network'] = json_encode($value);
    }

}
