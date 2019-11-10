<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Courses;
use Auth;
use Session;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    
    public function index(Request $request, User $user)
    {
        if(($request->submit == "enrol")&&(!Auth::user()))
        {
            //Session::flash('flash_message','you need to login to enrol thanks.');
           // echo "<script>alert(' you must l ogin first!!')</script>";
           
          return redirect("/login")->with('warning', 'you need to login to enrol.');
          echo "<script>alert(' you must login first!!')</script>";
          // $userId=User::findOrfail($user);
          // $courseId=egames::Courses('id')->first();
          //dd( $userId); ($this->middleware('auth'))
          /* 
           $data=new Enrol();
           $data->user_id=$userId;
           $data->course_id=$courseId;
           $data->save();*/
           
           

        }
        else{
            return redirect('/home/' . auth()->user()->id);
            
        }
    }
}

