<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     protected $fillable = [
        'nama',
    ];

     public function forum()
    {
    	return $this->hasMany('App\Forum');
    }
}
