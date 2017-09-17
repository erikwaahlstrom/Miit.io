<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{

	protected $table = 'meeting_dates';

    // Access level to App\yourModelName::$timestamps must be
    // public (as in class Illuminate\Database\Eloquent\Model)

        public $timestamps = false;

    protected $fillable = ['url_id', 'date'];

    // public function relatedMeeting()
    // {
    // 	$this->hasOne('Meeting', 'foreign_id', 'url_id');
    // }
}
