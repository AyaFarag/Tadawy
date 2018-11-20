<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = "specializations";

    protected $fillable = [
        'name', 'category_id'
    ];

    public function category(){
		return $this->belongsTo('App\Models\Category', 'category_id');
	}
}
