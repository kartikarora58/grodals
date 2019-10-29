<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	protected $fillable=['user_id','company_name','address1','address2','country_id','state_id','city_id','category_id','pincode','mobile','landline','email','logo','gallery','s_timing1','s_timing2','w_timing1','w_timing2','off_days','about_us','contact_person','designation','website','status'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function country()
    {
    	return $this->belongsTo('App\Country');
    }
    public function state()
    {
    	return $this->belongsTo('App\State');
    }
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
    public function Category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function saveUser($data,$id,$images,$img,$others)
    {


    	$this->user_id=$id;
    	$this->company_name=$data['company_name'];
    	$this->address1=$data['address1'];
    	$this->address2=$data['address2'];
    	$this->country_id=$data['country'];
    	$this->state_id=$data['state'];
    	$this->city_id=$data['city'];
    	$this->category_id=$data['category'];
        $this->others=json_encode($others);
    	$this->pincode=$data['pincode'];
    	$this->mobile=$data['mobile'];
    	$this->landline=$data['landline'];
    	$this->email=$data['email'];
    	$this->s_timing1=$data['s_timing1'];
    	$this->s_timing2=$data['s_timing2'];
    	$this->w_timing1=$data['w_timing1'];
    	$this->w_timing2=$data['w_timing2'];
    	$this->off_days=$data['off_days'];
    	$this->about_us=$data['about'];
    	$this->contact_person=$data['contact'];
    	$this->designation=$data['designation'];
    	$this->website=$data['website'];
     //    foreach($images as $img)
     //    {
    	// $this->gallery.=$img;
    	// }
        $this->logo=$img;
        $this->gallery=json_encode($images);
        $this->save();
    }
    public function updateUser($data,$id,$images,$img,$others)
    {
        
        
        $this->user_id=$id;
        $this->company_name=$data['company_name'];
        $this->address1=$data['address1'];
        $this->address2=$data['address2'];
        $this->country_id=$data['country'];
        $this->state_id=$data['state'];
        $this->city_id=$data['city'];
        $this->category_id=$data['category'];
        $this->others=json_encode($others);
        $this->pincode=$data['pincode'];
        $this->mobile=$data['mobile'];
        $this->landline=$data['landline'];
        $this->email=$data['email'];
        $this->s_timing1=$data['s_timing1'];
        $this->s_timing2=$data['s_timing2'];
        $this->w_timing1=$data['w_timing1'];
        $this->w_timing2=$data['w_timing2'];
        $this->off_days=$data['off_days'];
        $this->about_us=$data['about'];
        $this->contact_person=$data['contact'];
        $this->designation=$data['designation'];
        $this->website=$data['website'];
     //    foreach($images as $img)
     //    {
        // $this->gallery.=$img;
        // }
        if($img!='')
        {
        $this->logo=$img;
        }
        if($images!='')
        {
        $this->gallery=json_encode($images);
        }
        $this->save();
    }
    public function email()
    {
        $this->email='null';
        $this->save();
    }
}
