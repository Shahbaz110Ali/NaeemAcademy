<?php

namespace App\Http\Controllers\Admin\JstPst;

use App\Http\Controllers\Controller;
use App\Models\RegisteredSubject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TopicController extends Controller
{
    public function index($subjecAssignedId)
    {
        $RegisteredSubject = RegisteredSubject::find($subjecAssignedId)->with('subject:id,name')->first(['id', 'subject_id'])->toArray();
        $topics = Topic::where('registered_subject_id', $subjecAssignedId)->get()->toArray();
        return view('Admin.jstPst.topics.index', compact(['topics', 'RegisteredSubject']));
    }

    public function store(Request $request)
    {
        $inputs = $request->only(['registered_subject_id', 'title']);
        $validated = $request->validate([
            'registered_subject_id' => 'required|exists:registered_subjects,id',
            'title' => [
                'required',
                Rule::unique("topics")->where(function ($query) use ($inputs) {
                    return $query->where($inputs);
                })
            ]
        ], $request->all());

        $Topic = Topic::create($validated);
        if ($Topic->id) {
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Topic saved successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to save Topic']);
        }
    }

    public function update(Request $request)
    {
        $topic = Topic::find($request->topic_id);
        $inputs = ['title' => $request->title, 'registered_subject_id' => $topic->registered_subject_id];
        $request->validate([
            'title' => [
                'required',
                Rule::unique("topics")->where(function ($query) use ($inputs) {
                    return $query->where($inputs);
                })->ignore($topic->id)
            ]
        ], $request->all());
        if ($topic->id) {
            $topic->title = $request->title;
            $topic->save();
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Topic saved successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to save Topic']);
        }
    }

    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->back()->with(['toast' => 'success', 'msg' => 'Topic deleted successfully']);
    }

    public function get($subjecAssignedId) {
        $data['topics'] = Topic::where('registered_subject_id', $subjecAssignedId)->get()->toArray();
        echo json_encode($data);
    }
}
