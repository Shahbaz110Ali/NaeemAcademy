<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;


class AdminController extends Controller
{
    public function dashboard() {
        return view('Admin.dashboard');
    }
    
    
}
