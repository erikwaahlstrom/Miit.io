<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    public function dates()
    {
    	return $this->hasMany('App\Dates', 'url_id', 'url_id');
    }

    protected $fillable = ['name', 'email', 'description', 'date', 'emailinvite'];
}
