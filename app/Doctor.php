<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }
    public function reviews() {
    	return $this->hasMany('App\Review');
    }
    //When deleting a doctor, also delete assocated reviews
    protected static function boot() {
    	parent::boot();

    	static::deleting(function($doctor) {
    		$doctor->reviews()->delete();
    	});
    }
}
