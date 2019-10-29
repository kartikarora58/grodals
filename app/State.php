<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable=['state_name','country_id'];
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function city()
    {
    	return $this->hasMany('App\City');
    }
    public function UserDetail()
    {
    	return $this->hasOne('App\UserDetail');
    }
}
