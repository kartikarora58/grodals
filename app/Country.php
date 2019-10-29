<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['country_name'];
    public function state()
    {
    	return $this->hasMany('App\State');
    }
    public function UserDetail()
    {
    	return $this->hasOne('App\UserDetail');
    }
}
