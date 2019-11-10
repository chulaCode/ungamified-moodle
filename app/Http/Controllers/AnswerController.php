<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
Use  App\questions;
Use  App\answers;

class AnswerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, Request $request)
    {
        $answer=DB::table('answers')->get();

        //value of selected answer
        $res=Input::get('select1');
        $res2=Input::get('select2');
        
        //value of question from hidden field
        $result1=Input::get('question1');
        $result2=Input::get('question2');
        

        $select1="selected1";
        $select2="selected2";
        //retireve from que
        $selected1=input::get('selected1');
        $selected2=input::get('selected2');
    }

}
