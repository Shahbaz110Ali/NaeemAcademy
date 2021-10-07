<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;

use App\Models\Course;

class CourseController extends Controller
{
    public function course() {
        $courses = Course::where(["status"=>1])->get()->toArray();
        return view("Admin.Course.course", compact('courses'));
    }

    public function course_add() {
        return view("Admin.Course.add_course");
    }

    public function course_store(Request $request) {
        $controls = $request->all();
        $rules =  [
                'course_title' => 'required',
                'course_description' => 'required',
                'course_type' => 'required',
                'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'course_price' => 'required|numeric',
                'course_discount' => 'sometimes|numeric',
                'creator_name' => 'sometimes',
                'creator_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
                'status' => 'required',
                
            ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $image = $request->file('banner_image');
            $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $banner_img = $fileName."-".time().".".$image->getClientOriginalExtension();
            $request->file('banner_image')->storeAs('public/img/course/course_banner', $banner_img);

            $creator_img = null;
            if( $request->hasFile('creator_image')){
                $image = $request->file('creator_image');
                $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
                $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $creator_img = $fileName."-".time().".".$image->getClientOriginalExtension();
                $request->file('creator_image')->storeAs('public/img/course/course_creator', $creator_img);
            }

            $data = [
                'title' => $controls['course_title'],
                'description' => $controls['course_description'],
                'type' => $controls['course_type'],
                'course_image' => $banner_img,
                'price' => $controls['course_price'],
                'discount' => $controls['course_discount'],
                'creator' => $controls['creator_name'],
                'creator_image' => $creator_img,
                'status' => $controls['status'],
                
            ];
            $course = Course::create($data);
            if($course->id) {
                return redirect()->route('admin.course.list')->with(['toast' => 'success', 'msg' => 'Course created successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Course']);
            }
        }
        
    }

    // public function interface_edit($id) {
    //     $interface = Category::find($id)->toArray();
    //     return view('Admin.Test.edit_interface', compact('interface'));
    // }

    // public function interface_save(Request $request) {
    //     $id = $request->post("id");
    //     $validated = $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'status' => 'required',
    //     ],$request->all());
    //     $interface = Category::where("id",$id)->update($validated);
    //     if($interface) {
    //         return redirect()->route('admin.interface')->with(['toast' => 'success', 'msg' => 'Interface Updated successfully']);
    //     } else {
    //         return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Interface']);
    //     }
    // }
    
}
