<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Subject;
use Exception;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('status')->get()->toArray();
        return view("Admin.Subject.index", compact('subjects'));
    }

    public function add()
    {
        return view("Admin.Subject.add");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:subjects,name',
            'status_id' => 'required',

        ], $request->all());
        $Subject = Subject::create($validated);
        if ($Subject) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Subject created successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create subject']);
        }
    }

    public function edit($id)
    {
        $subject = Subject::find($id)->toArray();
        return view("Admin.Subject.edit", compact('subject'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => "required|unique:subjects,name,{$request->id}",
            'status_id' => 'required',

        ], $request->all());
        $Subject = Subject::find($request->id)->update($validated);
        if ($Subject) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Subject updated successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update subject']);
        }
    }

    public function toggle_status($id)
    {
        $subject = Subject::find($id);
        if ($subject->status_id == 1)
            $subject->status_id = 2;
        else if ($subject->status_id == 2)
            $subject->status_id = 1;
        $subject->save();
        return redirect()->back()->with(['toast' => 'success', 'msg' => 'Status updated successfully']);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('admin.subjects')->with(['toast' => 'success', 'msg' => 'Subject deleted successfully']);

    }
}
