<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::with('status')->get()->toArray();
        return view("Admin.Department.index", compact('departments'));
    }

    public function add() {
        return view("Admin.Department.add");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:departments,name',
            'status_id' => 'required',

        ],$request->all());
        $department = Department::create($validated);
        if($department) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Department created successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Department']);
        }
    }

    public function edit($id) {
        $department = Department::find($id)->toArray();
        return view("Admin.Department.edit", compact('department'));
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => "required|unique:departments,name,{$request->id}",
            'status_id' => 'required',

        ],$request->all());
        $department = Department::find($request->id)->update($validated);
        if($department) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Department updated successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Department']);
        }
    }

    public function toggle_status($id)
    {
        $department = Department::find($id);
        if ($department->status_id == 1)
            $department->status_id = 2;
        else if ($department->status_id == 2)
            $department->status_id = 1;
        $department->save();
        return redirect()->back()->with(['toast' => 'success', 'msg' => 'Status updated successfully']);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.departments')->with(['toast' => 'success', 'msg' => 'Department deleted successfully']);

    }
}
