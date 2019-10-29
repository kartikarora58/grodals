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
use Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $id=Auth::user()->id;
        $user=UserDetail::where('user_id',$id)->first();
        return view('user.home',compact('user','id'));
    }
    public function query()
    {
        $id=Auth::user()->id;
        $queries=Query::where('user_id',$id)->latest()->paginate(5);
        return view('user.query',compact('queries'));
    }
    public function register()
    {
        $id=Auth::user()->id;
        $users=UserDetail::get()->where('user_id',$id)->first();
        if(is_null($users))
        {
            $countries=Country::get();
             $states=State::get();
             $cities=City::get();
             $categories=Category::get();
             return view('user/form',compact('countries','states','cities','categories'));
        }
        else
        {
             $countries=Country::get();
             $states=State::get();
             $cities=City::get();
             $categories=Category::get();
             $image=array();
             $image=json_decode($users->gallery);
             $others=array();
             $others=json_decode($users->others);

             
             //dd($categories);
             return view('user/edit',compact('users','countries','states','cities','categories','image','others'));  
        }
        
    }
    public function update(Request $request)
    {
      
      if($request->file('img')!='')
      {
       $images=array();
        //gallery ka code
        if($files=$request->file('img'))
        {
          
            foreach($files as $file)
            {
                $name=$file->getClientOriginalName();
                  $destinationPath=public_path('/image');
                 $file->move($destinationPath,$name);
                 $images[]=$name;
            }
        }
       }
       else{
        $images='';
       } 

       $img='';
       if($request->file('logo')!='')
       {
        //logo ka code
        $file=$request->file('logo');
        $name=$file->getClientOriginalName();
        $destinationPath=public_path('/image');
        $file->move($destinationPath,$name);
        $img=$name;
        //other ka kaam
        }
        $others=array();
        $others=$request['others'];
        $id=Auth::user()->id;
        $user=UserDetail::where('user_id',$id)->first();
        $user->email='null';
        $user->save();
         $data=$this->validate($request,[
           'company_name'=>'required|max:255',
           'address1'=>'required',
           'address2'=>'nullable',
           'country'=>'required',
           'state'=>'required',
           'city'=>'required',
           'pincode'=>'required|max:6',
           'mobile'=>'required',
           'email'=>'required|unique:user_details|email',
           'website'=>'nullable',
           'about'=>'required|max:2000',
           'off_days'=>'nullable',
           'contact'=>'required',
           'designation'=>'required',
           's_timing1'=>'required',
           's_timing2'=>'required',
           'w_timing1'=>'required',
           'w_timing2'=>'required',
           'category'=>'required',
           'landline'=>'nullable',
        
           
        ]);
       
        
        $user->updateUser($data,$id,$images,$img,$others);
        return back();
    }
    public function store(Request $request)
    {
       
        $images=array();
        //gallery ka code
        if($files=$request->file('img'))
        {
            foreach($files as $file)
            {
                $name=$file->getClientOriginalName();
                  $destinationPath=public_path('/image');
                 $file->move($destinationPath,$name);
                 $images[]=$name;
            }
        }
       
        //logo ka code
        $file=$request->file('logo');
        $name=$file->getClientOriginalName();
        $destinationPath=public_path('/image');
        $file->move($destinationPath,$name);
        $img=$name;
        //other ka kaam
        $others=array();
        $x=$request['others'];
        foreach($x as $y)
        {
        $others[]=$y;
        }
       
        //
        $data=$this->validate($request,[
           'company_name'=>'required|max:255',
           'address1'=>'required',
           'address2'=>'nullable',
           'country'=>'required',
           'state'=>'required',
           'city'=>'required',
           'pincode'=>'required|max:6',
           'mobile'=>'required',
           'email'=>'required|unique:user_details|email',
           'website'=>'nullable',
           'about'=>'required|max:2000',
           'off_days'=>'nullable',
           'contact'=>'required',
           'designation'=>'required',
           's_timing1'=>'required',
           's_timing2'=>'required',
           'w_timing1'=>'required',
           'w_timing2'=>'required',
           'category'=>'required',
           'landline'=>'nullable',
           
        ]);
        $user=new UserDetail();
        $id=Auth::user()->id;
        $user->saveUser($data,$id,$images,$img,$others);
        return back();
    }
    public function index()
    {
        $id=Auth::user()->id;
        $user=UserDetail::get()->where('user_id',$id)->first();
        $images=json_decode($user->gallery);
        $others=json_decode($user->others);
        $categories=Category::all();
        
      return view('detail',compact('user','images','others','categories'));

        
    }
    public function replyform($id)
    {
      $user=Query::find($id);
      return view('user.reply',compact('user'));
    }
    public function reply(Request $request)
    {
      $data=array(
      'email'=>$request->email,
      'subject'=>$request->subject,
      'bodymessage'=>$request->message,
      );
      Mail::send('user.ureply',$data,function($message) use ($data){
      $message->from('kartikarora58@gmail.com');
      $message->to($data['email']);
      $message->subject($data['subject']);
      });
      return back();
    }
}
