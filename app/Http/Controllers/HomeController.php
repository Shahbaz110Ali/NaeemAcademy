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

class HomeController extends Controller
{
    public function index()
    {
        $data['interfaces'] = Category::where(["parent_id"=>null,"status"=>"1"])->get()->toArray();

        return view('welcome',$data);
    }

    public function about()
    {
        return view('about');
    }

    public function courses()
    {
        return view('courses');
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

    public function content($id) {
        // $id = base64_decode($id);
        $data['parent'] = Category::where("id",$id)->get()->toArray()[0];
        $data['categories'] = Category::where("parent_id",$id)->get()->toArray();
        $data['tests'] = Test::where("category_id",$id)->get()->toArray();
        // dd($tests);

        return view('content',$data);
    }

    public function take_test($id){
       
        $data['test'] = Test::where(["id"=>$id,"status"=>1])->get()->toArray()[0];
        $data['questions'] = Question::where(["test_id"=>$id,"status"=>1])->get()->toArray();
        if($data['test']['type'] == "practice"){
            return view('test',$data);
        }else if($data['test']['type'] == "competition"){
            if(Auth::check()){
                return view('test',$data);
            }else{
                return redirect(route("user.signin"));
            }
        }
        // dd($data);
        
    }

    public function submit_test(Request $request){
        $controls = $request->all();
        if(Auth::check()){
            $submitted = TrackTest::where(["test_id"=>$controls['test_id'],"user_id"=>Auth::user()->id])->get()->toArray();
            if(!empty($submitted)){
                return redirect()->back()->with("info",['class'=>"text-danger","msg"=>"you have already submitted this test"]);
            }
        }
        
        $user_attempt = isset($controls['question']) ? $controls['question'] : array();
        
        $test = Test::where("id",$controls['test_id'])->get()->toArray()[0];
        $questions = Question::where(["test_id"=>$controls['test_id'],"status"=>1])->get()->toArray();

        $min = $test['min_marks'];
        $max = $test['max_marks'];
        $negative = $test['negative_marks'];
        $total_q = count($questions);
        $marks_per_q = ($max / $total_q);

        $attempted_q = count($user_attempt);
        $un_answered = ($total_q - $attempted_q);

        $correct = 0;
        $wrong = 0;

        $plus = 0;
        $minus = 0;

        foreach($user_attempt as $q_id=>$op){
            $q = Question::where("id",$q_id)->get()->toArray()[0];
            if($q['answer'] == "option".$op){
                $correct++;
                $plus = ($plus + $marks_per_q);
            }else{
                $wrong++;
                $minus = $minus + $negative;
            }

            if($test['type'] == "competition"){
                if(Auth::check()){
                    $user = Auth::user();
                    $data = [
                        'user_id' => $user->id,
                        'test_id' => $controls['test_id'],
                        'question_id' => $q_id,
                        'answer' => "option".$op,
                        'status' => 1,
                    ];
                    TrackTest::create($data);
                }
                
            }
        }

        $ob_marks = ($plus - $minus);
        $percentage = (($ob_marks / $max) * 100);

        $data['test_info'] = [
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
        $data['test'] = $test;
        Session::put("submitted_test",$data);
        return redirect(route("test.result"));
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
