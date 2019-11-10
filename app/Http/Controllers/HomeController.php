<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;
use App\courses;
use App\enrol;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($user)
    {
      
        $user=User::findOrfail($user);
        $user_id=$user->id;
        $u_result = enrol::where('user_id', $user_id)->exists();
        $enrol=($u_result ? 'true' : 'false');
        return view('home', [ 'user'=>$user, 'enrol'=>$enrol ]);
        
       
    }
    public function store(Request $request,User $user)
    {   
        $course_id=1;
        $user_id=$user->id;
        $u_result = enrol::where('user_id', $user_id)->exists();
        $c_result=enrol::where('course_id',$course_id)->exists();
        $userA = Auth::user();
        if($user==$userA)
          {

                if($request->submit == "enrol"){
                if(($u_result)&&($c_result))
                {
                    return redirect("/profile/{$user->id}");
                }else
                {  
                    $enrol= new Enrol();
                    $enrol->user_id=$user_id;
                    $enrol->course_id=$course_id;
                    $enrol->save();
                    return redirect("/profile/{$user->id}")->with('success','you are successfully enrolled');
                } 
                
                }
                if($request->submit == "unenrol"){

                    //if unenrol button is clicked
                $result =Enrol::where('user_id',$user_id);
                $result->delete();
                    return redirect("home/{$user->id}");
                
                    //$result->delete();
                    

                }
       }
        else
            return redirect("/");

      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
}
