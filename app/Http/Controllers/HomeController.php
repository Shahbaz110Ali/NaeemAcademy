<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;

class HomeController extends Controller
{
    public function index()
    {
        $data['interfaces'] = Category::where("parent_id",null)->get()->toArray();

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
        dd("test will be taken here from the user");
    }
    
    public function subjectDetails()
    {
        return view('subject-details');
    }

    public function Quiz()
    {
        return view('quiz');
    }
    
}
