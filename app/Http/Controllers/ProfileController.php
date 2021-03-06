<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
Use  App\User;
Use App\Profile;
Use  App\answers;
Use  App\Counts;
Use  App\questions;
use App\lectureones;
use Session;
use Arr;

class ProfileController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth');
           $val=[12];
           $rand=$val[0];
           Session::put('keys',$val);
           $value=session('keys');  
           Session::put('Key2',$rand);
           $v_random=session('Key2');
    }
    

    /**
     * Show the applicationshboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $user,Request $request)
    {
       $user=User::findOrfail($user);
       $lecture1=lectureones::paginate(1);
      //$lecture1=DB::table('lectureones')->get()->paginate(1);
      
      //retrieving question
      
       $userA = Auth::user();
       if($user==$userA) 
       
         return view('profile',compact
         ('user','lecture1'));
      else
      return  redirect("/");
    }
    public function edit(User $user)
    {
        //this is same like the index function shorter way of doing it
        return view('profile.edit',compact('user'));
    }
    public function update(User $user)
    {
        $data=request()->validate([
         'username'=>'required',
         'image'=>'',
        ]);
        if (request('image')) {
            $imagePath = request('image');
            $img = Image::make($imagePath)->fit(1000,1000);
            $name=uniqid().$imagePath->getClientOriginalName();
            $imagePath->move('profile',$name);
          
           $user->image=$name;
            $user->save();
          
            $imageArray = ['image' => $name];
        }
        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
          // ['image'=>$name]
        ));
      
        return redirect("/profile/{$user->id}");
    }
        
    public function show( $user,Request $request)
    {
           $user=User::findOrfail($user);
           $lecture1=lectureones::paginate(1);
         
           function random()
            {
                $output=DB::table('questions')->inRandomOrder()->first();
                return $output;
            }
           
            function checkRandomvalue($stored){
                global $value;
                global $v_random;
                $id=$stored->id;
                $value=session('keys');
                if(array_search($id,$value,true)==true) {
                  
                   return;
                
                }else if(array_search($id,$value,true)==false){
                    Session::push('keys',$id);
                    session()->save();
                    $value=session('keys');
                    Session::put('Key2',$id);
                    $v_random=session('Key2');
                    //dd("good", $id, $value);
                   //dd(session($key));;  
               }    
            } 
            do{
                
                $r=random();
                $result=checkRandomvalue($r);   
            }
            while($result);
            $v_random=session('Key2');
            $output=DB::table('questions')->where('id',$v_random)->get();
            //session()->flush();
            //dd(session('keys'));
                $user_id=$user->id;
                $user_result = Counts::where('user_id', $user_id)->exists();
               
                $answer=answers::all();
                
                if($user_result)
                {
                    $count_value=Counts::where('user_id',$user_id)->first();
                
                    $value_right=$count_value->right;

                    $value_wrong=$count_value->wrong;
                
                    $value_attempt=$count_value->attempts;
                    
                    //if to increment attempt on page refresh due to counter timeout
                    if($request->submit != "Submit Answer"){
                        $attempt = Counts::where('user_id',$user_id)->first();
                        $attempt->attempts=$value_attempt+1;
                        $attempt->save();
                        if($value_attempt>10)
                        {
                            
                            $attempt_count = Counts::where('user_id',$user_id)->first();
                            $attempt_count->right=0;
                            $attempt_count->wrong=0;
                            $attempt_count->attempts=0;
                            $attempt_count->values=$value_right;
                            $attempt_count->save();
                            //dd(session('keys','yesma'));
                            session()->forget('keys'); 
                            return redirect()->back()->with('status', 'Thanks number of attempts completed');
                            
                        }
                    }
                    else
                    { 
                        //value of selected input field for answers
                        $res=$request->input('select1');
                        $res2=$request->input('select2');
                        $res3=$request->input('select3');
                        $res4=$request->input('select4');
                        
                    
                        //value of question from hidden field
                        $result1=$request->input('question1');
                        $result2=$request->input('question2');
                        $result3=$request->input('question3');
                        $result4=$request->input('question4');
                        $result5=$request->input('question5');
                        $result6=$request->input('question6');
                        $result7=$request->input('question7');
                        $result8=$request->input('question8');
                        $result9=$request->input('question9');
                        $result10=$request->input('question10');
                        // attempts count
                        $attempt = Counts::where('user_id',$user_id)->first();
                        $attempt->attempts=$value_attempt;
                        $attempt->save();
                       
                        if($value_attempt>10)
                        {
                            $stored_randomValue=[];
                            $attempt_count = Counts::where('user_id',$user_id)->first();
                            $attempt_count->right=0;
                            $attempt_count->wrong=0;
                            $attempt_count->attempts=0;
                            $attempt_count->values=$value_right;
                            $attempt_count->save();
                            session()->forget('keys');
                            return redirect()->back()->with('status', 'Thanks number of attempts completed');
                           
                        }
                        
                        //creating assocoative array from value gotten from form 
                        $question_result=array($result1=>$res, $result2=>$res2, $result3=>$res3,$result4=>$res4,$result5=>$res,
                        $result6=>$res2,$result7=>$res3,$result8=>$res4,$result9=>$res,$result10=>$res2);                  
                    
                        foreach($question_result as $result=>$value)
                        { 
                            foreach($answer as $results)
                            {
                                
                                if($result==$results->question_id)
                                {
                                    if($value==$results->answer)
                                    {
                                        $right = Counts::where('user_id',$user_id)->first();
                                        $right->right=$value_right+1;
                                        $right->save();
                                    
                                        return redirect()->back()->with('status', "Congrats option" .$value." is the right answer" );
                                           
                                    }
                                    elseif($value==""){
                                        return redirect("/question/{$user->id}")->with('status', 'You did not select any option please do that.');
                                    }
                                    else
                                    {
                                        $wrong = Counts::where('user_id',$user_id)->first();
                                        $wrong->wrong=$value_wrong+1;
                                        $wrong->save();
                                        return redirect("/question/{$user->id}")->with('status','Answer is option '.$results->answer." you selected option  " .$value. "
                                        sum up numbers with just 1 not 0. tip: for 8 bit assuming all numbers are 1 (128+64+32+16+8+4+2+1=255) hope this was helpful " );

                                
                                    }
                                    
                                }
                        
                            }
                            
                        }
                    }
                   
                   
                }
              
              
               $userA = Auth::user();
                if($user==$userA) 
                return view('question',compact('user','lecture1','output','count_value')); 
                else
                return  redirect("/");
            
    }

}
 
    


    

 


