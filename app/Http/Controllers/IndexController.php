<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Category;
use App\UserDetail;
use App\User;
use App\Query;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Mail;

class IndexController extends Controller
{
    public function index()
    {
    $categories=Category::all();
    $users=UserDetail::latest()->take(10)->where('status',1)->get();
    $states=State::all();
    return view('index',compact('categories','users','states'));
    }
    public function listing()
    {
    	$categories=Category::all();
        return view('listing',compact('categories'));
    }
    public function data()
    {
        if($_GET['id']!='all')
        {
            $id=$_GET['id'];
            $user=UserDetail::get()->where('category_id',$id)->where('status',1);
            
        }
        else
        {
            $user=UserDetail::get()->where('status',1);
        }
        return DataTables()->of($user)
                           ->addColumn('address1',function($data){
                                $address='<p>'.$data->address1.",".$data->city->city_name.",".$data->state->state_name.",".$data->country->country_name.'</p>';
                            return $address;
                           })
                           ->addColumn('action',function($data){
                            $button='<a  class="btn btn-outline-info" target="_blank" href="'.url('/detail/'.$data->id).'"  value='.$data->id.'>View Detail</a>';
                            return $button;
                            })
                           
                     
                       ->rawColumns(['address1','action'])
                ->make(true);
    }
    public function detail($id)
    {
    	$user=UserDetail::get()->where('id',$id)->first();
        $images=json_decode($user->gallery);
        $others=json_decode($user->others);
        $categories=Category::all();
        
    	return view('detail',compact('user','images','others','categories'));
    }
    public function card($id)
    {
        $users=UserDetail::where('status',1)->where('category_id',$id)->get();
        return view('card',compact('users'));
    }
    public function filter(Request $request)
    {
        $state=$request->state;
        $category=$request->category;
        if(is_null($state) && is_null($category))
        {
            return back();
        }
        else if(!empty($state) && is_null($category))
        {
             $users=UserDetail::where('status',1)->where('state_id',$state)->get(); 
        }
        else if(is_null($state) && !empty($category))
        {
             $users=UserDetail::where('status',1)->where('category_id',$category)->get(); 
        }
        else
            $users=UserDetail::where('status',1)->where('category_id',$category)->where('state_id',$state)->get();
       return view('card',compact('users'));

    }
    public function contact()
    {
        return view('contact');
    }
    public function query(Request $request)
    {
        $data=array(
       'name'=>$request->name,
       'email'=>$request->email,
       'vemail'=>$request->vemail,
       'bodymessage'=>$request->message
        );
        Mail::send('reply',$data,function($message) use ($data){
          // $message->from('kartik.arora30@yahoo.com');
           $message->to($data['email']); 
           
        });
        $query=new Query();
        $query->saveQuery($request);
        return back();
    }
}
