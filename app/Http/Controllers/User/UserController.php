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

class UserController extends Controller
{
    public function dashboard(){
        $data['user'] = Auth::user()->toArray();
        return view("user.dashboard",$data);
    }

    public function available_tests(){
        $data['user'] = Auth::user()->toArray();
        $data['tests'] = array();
        $tests = Test::where(["type"=>"competition","status"=>1])->get()->toArray();
        if(!empty($tests)){
            foreach($tests as $key=>$val){
                $test_taken = TestUser::where(["test_id"=>$val['id'],"user_id"=>$data['user']['id']])->get()->toArray();
                if(empty($test_taken)){
                    $data['tests'][$key] =   $val;
                    $cat_id = $data['tests'][$key]['category_id'];
                    while($cat_id != null){
                        $cat = Category::where("id",$cat_id)->get()->ToArray()[0];
                        $data['tests'][$key]['category'][$cat['id']] = $cat['title'];
                        $cat_id = $cat['parent_id'];
                    }
                }
            }
        }

        // dd($data);
        return view("user.available_tests",$data);

    }

    public function taken_tests(){
        $data['user'] = Auth::user()->toArray();
        $data['tests'] = array();
        $test_user = TestUser::where("user_id",$data['user']['id'])->get()->toArray();
        if(!empty($test_user)){
            $index = 0;
            foreach($test_user as $key=>$val){
                $data['tests'][$index] =   Test::where("id",$val['test_id'])->get()->toArray()[0];
                $cat_id = $data['tests'][$index]['category_id'];
                while($cat_id != null){
                    $cat = Category::where("id",$cat_id)->get()->ToArray()[0];
                    $data['tests'][$index]['category'][$cat['id']] = $cat['title'];
                    $cat_id = $cat['parent_id'];
                }
                
                $index++;
            }
        }
        return view("user.taken_tests",$data);
        
    }
}
