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
use App\Models\BuyRequest;



class CourseController extends Controller
{
    public function buy_course($id){
        $data['course'] =  Course::find($id)->first()->toArray();
        $data['user']   =  User::find(Auth::User()->id)->first()->toArray();
        return view('User.Course.buy_course',$data);
    }

    public function purchase_course(Request $request){
        $controls = $request->all();
        $course =  Course::where("id",$controls['course_id'])->first()->toArray();
        $user   =  User::where("id",Auth::user()->id)->first()->toArray(); 
        
        $alreadyBought = BuyRequest::where(["user_id"=>Auth::user()->id,"course_id"=>$controls['course_id']])->get()->toArray();
        if(!is_null($alreadyBought) || !empty($alreadyBought)){
            return redirect(route("user.course.request.list"))->with(['toast' => 'error', 'msg' => 'You have already requested this course']);
        }
        $rules =  [
                'user_id' => 'required',
                'course_id' => 're quired',
                'payment_method' => 'required',
                'payment_date' => 'required',
                'amount_paid' => 'nullable|numeric',
                'image_proof' => 'somet imes|image|mimes:jpeg,png,jpg,gif,svg',    
            ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data =  [
                'user_id' => Auth::user()->id,
                'course_id' => $controls['course_id'],
                'payment_method' => $controls['payment_method'],
                'payment_date' => $controls['payment_date'],
                'amount_paid' => $controls['amount_paid'],
                'status'  => 1      
            ];
            if( $request->hasFile('image_proof')){
                $image = $request->file('image_proof');
                $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
                $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $image_proof = Auth::user()->id."-".$fileName."-".time().".".$image->getClientOriginalExtension();
                $request->file('image_proof')->storeAs('public/img/course/'.$controls['course_id'].'/payment_proof', $image_proof);
                
                $data['image_proof'] = $image_proof;
            }
            
            if(BuyRequest::create($data)) {
                return redirect()->route('user')->with(['toast' => 'success', 'msg' => 'Buy Request sent. Admin will contact you shortly']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Buy Request']);
            }
        }
    }

    public function purchase_req_list(){
        dd("here purchase list will be placed");
    }
}
