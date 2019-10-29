<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable=['name','email','message'];
    
    public function saveQuery($data)
    {
    	$this->user_id=$data['vid'];
    	$this->name=$data['name'];
    	$this->email=$data['email'];
    	$this->message=$data['message'];
    	$this->save();
    }
}
