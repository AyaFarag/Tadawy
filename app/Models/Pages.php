<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    const ABOUT_US = 'about_us';
    const PRIVACY = 'privacy';
    protected $table = 'pages';

    protected $fillable = [
        'content','title','slug'
    ];
}
