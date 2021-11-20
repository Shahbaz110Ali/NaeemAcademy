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

use App\Models\Course;

use App\Models\HomeSetting;
use App\Models\Setting;



class SettingController extends Controller
{
    public function home_interface(){
        $interfaces = HomeSetting::where("type","interface")->get()->toArray();
        
        // dd($interfaces);
        return view("Admin.Settings.home_interface");
    }
    public function home_category(){
        $categories = HomeSetting::where("type","category")->get()->toArray();
        
        dd($categories);
        return view("Admin.Settings.home_category");
    }

    public function courses_description(){
        $data = Setting::where("key","courses_description")->get()->toArray();
        return view('Admin.Settings.courses_description',["data"=>$data]);
    }

    public function courses_description_store(Request $request){
        $data = Setting::where("key","courses_description")->get()->toArray();
        if(!empty($data)){
            $save = Setting::where("key","courses_description")->update(["value"=>$request->post("courses_description")]);
        }else{
            $save = Setting::create(["key"=>"courses_description","value"=>$request->post("courses_description")]);
        }

        if($save){
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Courses description saved']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to save Courses description']);
        }
    }
}
