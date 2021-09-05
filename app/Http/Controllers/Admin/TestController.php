<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Validation\Rule;

class TestController extends Controller
{
    public function index() {
        $tests = Test::get()->toArray();
        return view("Admin.Test.index", compact('tests'));
    }

    public function add() {
        return view("Admin.Test.add");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'about' => 'required',
            'status_id' => 'required',
            'home_page_active' => [
                'numeric',
                Rule::in([1, 0]),
            ],
            'priority' => [
                'numeric',
                Rule::in([1, 2, 3]),
            ],
            'include_department' => [
                'numeric',
                Rule::in([0, 1]),
            ]
        ],$request->all());
        $test = Test::create($validated);
        if($test->id) {
            return redirect()->route('admin.tests.edit', $test->id)->with(['toast' => 'success', 'msg' => 'Test created successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Test']);
        }
    }

    public function edit($id) {
        $test = Test::find($id)->toArray();
        return view('Admin.Test.edit', compact('test'));
    }

    public function attachDepartment(Request $request) {
        $validated = $request->validate([
            'department' => 'required',
            'test_id' => 'required'
        ],$request->all());
        dd($request->all());
    }
}
