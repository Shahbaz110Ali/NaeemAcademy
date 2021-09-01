<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;

class TestController extends Controller
{
    public function interface() {
        $interfaces = Category::get()->toArray();
        return view("Admin.Test.interface", compact('interfaces'));
    }

    public function interface_add() {
        return view("Admin.Test.add_interface");
    }

    public function interface_store(Request $request) {
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],$request->all());
        $interface = Category::create($validated);
        if($interface->id) {
            return redirect()->route('admin.interface.edit', $interface->id)->with(['toast' => 'success', 'msg' => 'Interface created successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Interface']);
        }
    }

    public function interface_save(Request $request) {
        $id = $request->post("id");
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],$request->all());
        $interface = Category::where("id",$id)->update($validated);
        if($interface) {
            return redirect()->route('admin.interface.edit', $id)->with(['toast' => 'success', 'msg' => 'Interface Updated successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Interface']);
        }
    }

    public function interface_edit($id) {
        $interface = Category::find($id)->toArray();
        return view('Admin.Test.edit_interface', compact('interface'));
    }

    public function attachDepartment(Request $request) {
        $validated = $request->validate([
            'department' => 'required',
            'test_id' => 'required'
        ],$request->all());
        dd($request->all());
    }
}
