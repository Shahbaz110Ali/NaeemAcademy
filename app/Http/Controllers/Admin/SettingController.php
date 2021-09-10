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
use App\Models\HomeSetting;


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
}
