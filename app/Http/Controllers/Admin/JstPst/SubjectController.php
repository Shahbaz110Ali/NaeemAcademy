<?php

namespace App\Http\Controllers\Admin\JstPst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\RegisteredSubject;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    protected $category_id = 1;

    public function index()
    {
        $RegisteredSubject = RegisteredSubject::with(['category','subject'])->where('category_id', $this->category_id)->get()->toArray();
        $subjects = Subject::where('status_id', 1)->get()->toArray();
        return view("Admin.JstPst.subjects.index", compact(['RegisteredSubject', 'subjects']));
    }

    public function add()
    {
        $subjects = Subject::where('status_id', 1)->get()->toArray();
        return view("Admin.JstPst.subjects.add", compact('subjects'));
    }

    public function store(Request $request)
    {
        $inputs = $request->only(['category_id', 'subject_id']);
        $request->validate([
            'subject_id' => [
                'required',
                'exists:subjects,id',
                Rule::unique('registered_subjects')->where(function ($query) use($inputs) {
                    return $query->where($inputs);
                })
            ]
        ], $request->all(), [
            'subject_id.required' => 'Required',
            'subject_id.exists' => 'Subject does not exists',
            'subject_id.unique' => 'Subject already added',
        ]);

        $RegisteredSubject = RegisteredSubject::create([
            "subject_id" => $request->subject_id,
            "category_id" => $this->category_id,
        ]);
        if ($RegisteredSubject) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Subject saved successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to save Subject']);
        }
    }

    public function destroy($id)
    {
        $RegisteredSubject = RegisteredSubject::find($id);
        $RegisteredSubject->delete();
        return redirect()->route('admin.jstPst.subjects')->with(['toast' => 'success', 'msg' => 'Subject deleted successfully']);
    }
}
