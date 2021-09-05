<?php

namespace App\Http\Controllers\Admin\JstPst;

use App\Http\Controllers\Controller;
use App\Models\RegisteredSubject;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $category_id = 1;

    public function index()
    {
        $tests = [];
        return view("Admin.JstPst.tests.index", compact('tests'));
    }

    public function add()
    {
        $tests = [];
        $subjects = RegisteredSubject::with('subject:id,name')->where('category_id', $this->category_id)->get(['id', 'subject_id'])->toArray();
        
        return view("Admin.JstPst.tests.add", compact('tests', 'subjects'));
    }
    
}
