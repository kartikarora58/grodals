<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Category;
use App\UserDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Response;


class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.admin-home');
    }
    public function pending()
    {
        $users=UserDetail::latest()->get()->where('status',NULL);
      
        return view('admin.pending',compact('users'));
    }
    public function check($id)
    {
        $user=UserDetail::get()->where('id',$id)->first();
        $country=Country::find($user->country_id);
        $state=State::find($user->state_id);
        $city=City::find($user->city_id);
        $category=Category::find($user->category_id);
        $categories=Category::get();
     
        return Response::json(array('user'=>$user,'country'=>$country,'state'=>$state,'city'=>$city,'category'=>$category,'categories'=>$categories));
    }
    public function approve($id)
    {
        $user=UserDetail::find($id);
        $user->status="1";
        $user->save();
        return Response::json($user);
    }
    public function reject($id)
    {
        $user=UserDetail::find($id);
        $user->status="8";
        $user->save();
        return Response::json($user);
    }
    public function approved()
    {
        $users=UserDetail::latest()->get()->where('status',1);
        return view('admin.approved',compact('users'));
    }
    public function rejected()
    {
        $users=UserDetail::latest()->get()->where('status',8);
        return view('admin.rejected',compact('users'));
    }
    // public function approved()
    // {
    //     $users=UserDetail::latest()->get()->where('status',"1");
    //     dd($user);
    //     return view('admin.approved',compact('user'));
    // }
}
