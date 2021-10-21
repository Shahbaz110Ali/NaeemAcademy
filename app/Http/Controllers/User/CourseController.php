<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;
use App\Models\Course;


class CourseController extends Controller
{
    public function buy_course($id){
        $data['course'] =  Course::find($id)->first()->toArray();
        $data['user']   =  User::find(Auth::User()->id)->first()->toArray();
        return view('User.Course.buy_course',$data);
    }

    public function purchase_course(Request $request){
        $controls = $request->all();
        $course =  Course::find($controls['course_id'])->first()->toArray();
        $user   =  User::find($controls['user_id'])->first()->toArray();
        if(is_null($user['contact']) || empty($user['contact'])){
            return redirect(route("user.profile"))->with(['toast' => 'error', 'msg' => 'Add active Whatsapp Number']);
        }
        $rules =  [
                'user_id' => 'required',
                'course_id' => 'required',
                'payment_method' => 'required',
                'payment_date' => 'required',
                'amount_paid' => 'nullable|numeric',
                'image_proof' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',    
            ];
        // $validator = Validator::make($controls,$rules);
        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }else{
        //     $data = [
        //         'title' => $controls['course_title'],
        //         'description' => $controls['course_description'],
        //         'type' => $controls['course_type'],
        //         'price' => $controls['course_price'],
        //         'discount' => $controls['course_discount'],
        //         'creator' => $controls['creator_name'],
        //         'status' => $controls['status'],
                
        //     ];
        //     if( $request->hasFile('banner_image')){
        //         $image = $request->file('banner_image');
        //         $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
        //         $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        //         $banner_img = $fileName."-".time().".".$image->getClientOriginalExtension();
        //         $request->file('banner_image')->storeAs('public/img/course/course_banner', $banner_img);
                
        //         $data['course_image'] = $banner_img;
        //     }
            
        //     if( $request->hasFile('creator_image')){
        //         $image = $request->file('creator_image');
        //         $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
        //         $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        //         $creator_img = $fileName."-".time().".".$image->getClientOriginalExtension();
        //         $request->file('creator_image')->storeAs('public/img/course/course_creator', $creator_img);
                
        //         $data['creator_image'] = $creator_img;
        //     }

        //     $course = Course::where("id",$request->post("id"))->update($data);
        //     if($course) {
        //         return redirect()->route('admin.course.list')->with(['toast' => 'success', 'msg' => 'Course updated successfully']);
        //     } else {
        //         return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Course']);
        //     }
        // }
    }
}
