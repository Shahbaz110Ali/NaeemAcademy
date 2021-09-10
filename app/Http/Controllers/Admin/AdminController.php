<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;


class AdminController extends Controller
{
    public function dashboard() {
        return view('Admin.dashboard');
    }

    public function competitions(){
        $data['competitions'] = Test::where(['type'=>"competition","status"=>1])->get()->toArray();
        foreach($data['competitions'] as $key=>$competition){
            $cat_id = $competition['category_id'];
            while($cat_id != null){
                $cat = Category::where("id",$cat_id)->get()->ToArray()[0];
                $data['competitions'][$key]['category'][$cat['id']] = $cat['title'];
                $cat_id = $cat['parent_id'];
            }

            $data['competitions'][$key]['participants'] = count(TestUser::where("test_id",$competition['id'])->get()->toArray());


        }
        
        return view("Admin.Test.competitions",$data);
    }

    public function competition_participants($id){
        $test_user = TestUser::where("test_id",$id)->get()->toArray();
        $data['test'] = Test::where("id",$id)->get()->toArray()[0];
        $data['users'] = array();
        foreach($test_user as $key=>$val){
            $user = User::where("id",$val['user_id'])->get()->toArray()[0];
            $data['users'][$key] = $user;

            //==============
            $user_attempt = TestUserQuestion::where("test_user_id",$val['id'])->get()->toArray();
            $questions = Question::where(["test_id"=>$data['test']['id'],"status"=>1])->get()->toArray();
            
            $min = $data['test']['min_marks'];
            $max = $data['test']['max_marks'];
            $negative = $data['test']['negative_marks'];
            $total_q = count($questions);
            $marks_per_q = ($max / $total_q);

            $attempted_q = count($user_attempt);
            $un_answered = ($total_q - $attempted_q);

            $correct = 0;
            $wrong = 0;

            $plus = 0;
            $minus = 0;

            foreach($user_attempt as $q_id=>$op){
                $q = Question::where("id",$op['question_id'])->get()->toArray()[0];
                if($q['answer'] == "option".$op['answer']){
                    $correct++;
                    $plus = ($plus + $marks_per_q);
                }else{
                    $wrong++;
                    $minus = $minus + $negative;
                }
            }

            $ob_marks = ($plus - $minus);
            $percentage = (($ob_marks / $max) * 100);

            $data['users'][$key]['test_info'] = [
                "test_id"=>$data['test']['id'],
                'min'=>$min,
                'max'=>$max,
                'negative'=>$negative,
                'total_q'=>$total_q,
                'marks_per_q'=>$marks_per_q,
                'attempted_q'=>$attempted_q,
                'un_answered'=>$un_answered,
                'correct'=>$correct,
                'wrong'=>$wrong,
                "plus_marks"=>$plus,
                "minus_marks"=>$minus,
                'ob_marks'=>$ob_marks,
                'percentage'=>$percentage,
                
            ];

            //==============

        }
        

        // dd($data);
        return view("Admin.Test.competition_participants",$data);
    }

    public function competition_review($test_id,$user_id){
        // dd($test_id);
       
        $data['test'] = Test::where(["id"=>$test_id,"status"=>1])->get()->toArray()[0];
        if($data['test']['type'] == "competition"){
            
                $user = User::where("id",$user_id)->get()->toArray()[0];
                $test_user = TestUser::where(['user_id'=>$user['id'],'test_id'=>$test_id])->get()->toArray()[0];
                $user_attempt = TestUserQuestion::where("test_user_id",$test_user['id'])->get()->toArray();
                foreach($user_attempt as $key=>$val){
                    $data['user_attempt'][$val['question_id']] = str_replace("option", "", $val['answer']);
                }
                
                $data['user_attempt'] = json_encode($data['user_attempt']);
            
            
        }else{
            if(Session::has("submitted_test")){
                $data['user_attempt'] = json_encode(Session::get("submitted_test")['test_info']['user_attempt']);
                
            }else{
                return redirect("/");
            }
        }
        $data['questions'] = Question::where(["test_id"=>$test_id,"status"=>1])->get();
        
        
        return view('review_test',$data);
    }

   

    
    
    
}
