<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;
use App\Models\Course;


class CourseController extends Controller
{
    public function buy_course($id){
        $data['course'] =  Course::find($id)->first()->toArray();
        $data['user']   =  User::find(Auth::User()->id)->first()->toArray();
        return view('User.Course.buy_course',$data);
    }

    public function purchase_course(Request $request){
        dd($request->all());
    }
}
