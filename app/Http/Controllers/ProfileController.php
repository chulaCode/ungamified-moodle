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

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( $user,Request $request)
    {
       $user=User::findOrfail($user);
      // $lecture1=lectureones::all();
      $lecture1=DB::table('lectureones')->get();
      
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
        //dd($user);
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
           // $imagePath->store('profile','public');
           // $name=$imagePath->getClientOriginalName();
            //$file=$imagePath->getClientOriginalExtension();
           // $name=$file->getClientOriginalName();
           // $img->save();
           $user->image=$name;
            $user->save();
          
            $imageArray = ['image' => $name];
        }
        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
          // ['image'=>$name]
        ));
       /*
       $user->image = whatevertheimagepathis; $user->save()
        if($file=request('image'))
        {
            $name=$file->getClientOriginalName();
            if($file->move('profile',$name))
            {
        
                $img=new Profile();
                $img->image=$name;
                $img->user_id =auth()->user()->id;
                $img->username=$data['username'];
                $img->save();
            }    
        }
        auth()->user()->update(
            array_merge(
                $data,
                ['image'=>$img]
            )    
        );
        */
        return redirect("/profile/{$user->id}");
    }
        
    public function show( $user,Request $request)
    {
         $user=User::findOrfail($user);
            $output=DB::table('questions')->inRandomOrder()->limit(1)->get();
            $user_id=$user->id;
            $user_result = counts::where('user_id', $user_id)->exists();
            
            $answer=answers::all();
            if(!$user_result)
            {
              $insert= new Counts();
              $insert->user_id=$user_id;
              $insert->right=0;
              $insert->wrong=0;
              $insert->attempts=0;
              $insert->save();
            }
            else{
                $count_value=Counts::all()->first();
                $value_right=$count_value->right;

                $value_wrong=$count_value->wrong;
            
                $value_attempt=$count_value->attempts;

             
                if($request->submit == "Submit Answer")
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

                // attempts count
                    $attempt = Counts::where('user_id',$user_id)->first();
                    $attempt->attempts=$value_attempt+1;
                    $attempt->save();
                    if($value_attempt>10)
                    {
                        $attempt_count = Counts::where('user_id',$user_id)->first();
                        $attempt_count->right=0;
                        $attempt_count->wrong=0;
                        $attempt_count->attempts=0;
                        $attempt_count->save();
                        return redirect("/profile/{$user->id}")->with('status', 'Thanks number of attempts completed');
                    
                    }
                    
                    //creating assocoative array from value gotten from form 
                    $question_result=array($result1=>$res, $result2=>$res2, $result3=>$res3,$result4=>$res4,$result5=>$res);                  
                
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
                                    //Array_push($outcome, 'Answer for question'.$result. "is correct");
                                // dd($counter);
                                                
                                }
                                elseif($value==""){
                                
                                //Array_push($outcome, 'question  '.$result.'  nothing selected');
                                }
                                else
                                {
                                    $wrong = Counts::where('user_id',$user_id)->first();
                                    $wrong->wrong=$value_wrong+1;
                                    $wrong->save();

                                // for wrong answer---- echo "you need to have all answer to earn point try again";
                                //Array_push($outcome, 'Answer is '.$results->answer." you choosed  ".$value. "for question ".$result);
                                }
                                //number of attempts
                            }
                    
                        }
                        
                    }
                }
            }
           
            return view('question',compact('user','lecture1','output','count_value')); 
        
        }
    }


