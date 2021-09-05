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

class UserController extends Controller
{
    public function dashboard(){
        $data['user'] = Auth::user()->toArray();
        return view("user.dashboard",$data);
    }

    public function taken_tests(){
        $data['user'] = Auth::user()->toArray();
        // $taken_tests = TestTrack::Where("user_id")->get()->toArray();
        // if(!empty($taken_tests)){
        //     foreach($taken_tests as $key=>$val){
        //         $test = Test::where("id",$val['test_id'])->get()->toArray();
                

        //     }
        // }
        dd($data);
        return view("user.dashboard",$data);
        
    }
}
