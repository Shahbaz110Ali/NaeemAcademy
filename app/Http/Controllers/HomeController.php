<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;
use App\Models\Course;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {

        $data['interfaces_top'] = Category::where(["parent_id"=>null,"homepage_visibility_layout"=>"top","status"=>"1"])->get()->toArray();
        $data['interfaces_bottom'] = Category::where(["parent_id"=>null,"homepage_visibility_layout"=>"bottom","status"=>"1"])->get()->toArray();
        $data['top_interface_color'] = ["#5578ff","#e80368","#e361ff","#47aeff","#ffa76e","#11dbcf","#4233ff"];
        
        return view('welcome',$data);
    }

    public function about()
    {
        return view('about');
    }

    public function courses()
    {
        $tab_desc = Setting::where("key","courses_description")->get()->toArray();
        $courses = Course::where("status",1)->get()->toArray();
        return view('courses',compact("courses"),['tab_description'=>$tab_desc]);
    }

    public function trainers()
    {
        return view('trainers');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function contact()
    {
        return view('contact');
    }

    public function content($id) { //this code to display tests and categories on home
        // $id = base64_decode($id);
        $data['parent'] = Category::where("id",$id)->get()->toArray()[0];
        $data['categories'] = Category::where("parent_id",$id)->get()->toArray();
        $data['tests'] = Test::where(["category_id"=>$id])->get()->toArray();
        // dd($tests);

        return view('content',$data);
    }

    public function take_test($id){
       
        $data['test'] = Test::where(["id"=>$id])->get()->toArray()[0];
        $data['questions'] = Question::where(["test_id"=>$id,"status"=>1])->get();
       
        if($data['test']['type'] == "practice"){
            return view('test', $data);
        }
       
        
    }

    public function review_test($id){
       
        $test = Test::where(["id"=>$id,"status"=>1])->get()->toArray()[0];
        $data['test'] = $test;
        if($data['test']['type'] == "competition"){
            if(Auth::check()){
                $user = Auth::user()->toArray();
                $test_user = TestUser::where(['user_id'=>$user['id'],'test_id'=>$id])->get()->toArray()[0];
                $user_attempt = TestUserQuestion::where("test_user_id",$test_user['id'])->get()->toArray();
                foreach($user_attempt as $key=>$val){
                    $data['user_attempt'][$val['question_id']] = str_replace("option", "", $val['answer']);
                }
                $data['user_attempt'] = json_encode($data['user_attempt']);
                

                 //==============
                 
                 $questions = Question::where(["test_id"=>$id,"status"=>1])->get()->toArray();
         
                 $min_marks = $test['min_marks'];
                 $marks_per_q = $test['marks_per_question'];
                 $negative_marks = $test['negative_marks'];
                 
                 $total_q = count($questions);
                 $total_attempted_q = count($user_attempt);
                 $total_un_attempted_q = ($total_q - $total_attempted_q);
         
                 $total_marks = ($total_q * $marks_per_q);
         
                 $correct = 0;
                 $wrong = 0;
         
                 foreach($user_attempt as $attempt){
                     $q = Question::where("id",$attempt['question_id'])->get()->toArray()[0];
                     if($q['answer'] == $attempt['answer']){
                         $correct++;
                     }else{
                         $wrong++;
                     }
         
                 }
         
                 $correct_marks = ($marks_per_q * $correct);
                 $wrong_marks = ($negative_marks * $wrong);
         
                 $ob_marks = round(($correct_marks - $wrong_marks),2);
                 $percentage = round((($ob_marks / $total_marks) * 100),2);
         
                 $data['test_info'] = [
                     "test_id"=>$test['id'],
                     'min_marks'=>$min_marks,
                     'marks_per_q'=>$marks_per_q,
                     'negative_marks'=>$negative_marks,
                     'total_q'=>$total_q,
                     'attempted_q'=>$total_attempted_q,
                     'un_attempted'=>$total_un_attempted_q,
                     'correct_q'=>$correct,
                     'wrong_q'=>$wrong,
                     "correct_marks"=>$correct_marks,
                     "wrong_marks"=>$wrong_marks,
                     'ob_marks'=>$ob_marks,
                     'total_marks'=>$total_marks,
                     'percentage'=>$percentage,
                 ];
                 $data['test'] = $test;
                 Session::put("submitted_test",$data);
            //==============

                
            }else{
                return redirect(route("user.login"));
            }
            
        }else{
            if(Session::has("submitted_test")){
                $data['user_attempt'] = json_encode(Session::get("submitted_test")['test_info']['user_attempt']);
                
            }else{
                return redirect("/");
            }
        }
        $data['questions'] = Question::where(["test_id"=>$id,"status"=>1])->get();
        
        
        return view('review_test',$data);
    }

    public function getQuestions($id){

        $questions  = Question::where(["test_id"=>$id,"status"=>1])->get();
        if(!empty($questions)){
            foreach($questions as $key=>$question){
                $questions[$key]['sr'] = $key+1;
            }
        }
        return $questions;
    }

    public function submit_test(Request $request){
        $controls = $request->all();
        $test = Test::where("id",$controls['test_id'])->get()->toArray()[0];
        if(Auth::check()){
            $submitted = TestUser::where(["test_id"=>$controls['test_id'],"user_id"=>Auth::user()->id])->get()->toArray();
            if(!empty($submitted)){
                return redirect()->back()->with("info",['class'=>"text-danger","msg"=>"you have already submitted this test"]);
            }

            if($test['type'] == "competition"){
                $data = [
                    'user_id' => Auth::user()->id,
                    'test_id' => $controls['test_id'],
                ];
                $test_user = TestUser::create($data);
            }
        }
        
        $user_attempt = isset($controls['question']) ? $controls['question'] : array();
        
        
        
        $questions = Question::where(["test_id"=>$controls['test_id'],"status"=>1])->get()->toArray();

        $min_marks = $test['min_marks'];
        $marks_per_q = $test['marks_per_question'];
        $negative_marks = $test['negative_marks'];
        
        $total_q = count($questions);
        $total_attempted_q = count($user_attempt);
        $total_un_attempted_q = ($total_q - $total_attempted_q);

        $total_marks = ($total_q * $marks_per_q);

        $correct = 0;
        $wrong = 0;

        foreach($user_attempt as $q_id=>$op){
            $q = Question::where("id",$q_id)->get()->toArray()[0];
            if($q['answer'] == "option".$op){
                $correct++;
            }else{
                $wrong++;
            }

            if($test['type'] == "competition"){
                if(Auth::check()){
                    $user = Auth::user();
                    $data = [
                        'test_user_id'=>$test_user->id,
                        'question_id'=>$q_id,
                        'answer'=>"option".$op,
                    ];
                    TestUserQuestion::create($data);
                }
            }
        }

        $correct_marks = ($marks_per_q * $correct);
        $wrong_marks = ($negative_marks * $wrong);

        $ob_marks = round(($correct_marks - $wrong_marks),2);
        $percentage = round((($ob_marks / $total_marks) * 100),2);

        $data['test_info'] = [
            "test_id"=>$controls['test_id'],
            'min_marks'=>$min_marks,
            'marks_per_q'=>$marks_per_q,
            'negative_marks'=>$negative_marks,
            'total_q'=>$total_q,
            'attempted_q'=>$total_attempted_q,
            'un_attempted'=>$total_un_attempted_q,
            'correct_q'=>$correct,
            'wrong_q'=>$wrong,
            "correct_marks"=>$correct_marks,
            "wrong_marks"=>$wrong_marks,
            'ob_marks'=>$ob_marks,
            'total_marks'=>$total_marks,
            'percentage'=>$percentage,
            'user_attempt'=>$user_attempt
        ];
        $data['test'] = $test;
        Session::put("submitted_test",$data);
        
        return redirect(route("test.review",$controls['test_id']));
        // return redirect(route("test.result"));
    }

    public function result_test(){
        if(Session::has("submitted_test")){
            $data['test_info'] = Session::get("submitted_test")['test_info'];
            $data['test'] = Session::get("submitted_test")['test'];
            // dd($data);
            return view("result",$data);

        }else{
            return redirect("/");
        }
        
    }
    
    public function subjectDetails()
    {
        return view('subject-details');
    }

    // public function Quiz()
    // {
    //     return view('quiz');
    // }
    
}
