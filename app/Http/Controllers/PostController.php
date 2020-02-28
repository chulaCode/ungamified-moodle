<?php

namespace App\Http\Controllers;

use Image;
use App\lectureones;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('profile.create');
    }
    public function store()
    {
      
        $data=request()->validate([
            'name'=>'required',
            'image'=>['required','image'],
        ]);
        if($file=request('image'))
        {
            //$img = Image::make(public_path("/uploads/".$file))->fit(1000,1000);
           // $imag=uniqid().$file->getClientOriginalName();
           $filename = time().'.'.$file->getClientOriginalExtension();
           $img=Image::make($file)->resize(1000,1000);
           $img->save('uploads/'.$filename);
          
                $img=new lectureones();
                $img->image=$img;
                $img->name= $data['name'];
                $img->save();
            
        }
        /*
        Lesson1::create([
            'name'=>$data['name'],
        
            'image'=>$imag,]);
*/
        
        return redirect('/profile/1');
    
        }
       
}
