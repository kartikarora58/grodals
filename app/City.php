<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['city_name','state_id'];
    public function state()
    {
    	return $this->belongsTo('App\State');
    }
    public function UserDetail()
    {
    	return $this->hasOne('App\City');
    }
}
