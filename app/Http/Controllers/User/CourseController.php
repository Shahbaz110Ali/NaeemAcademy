<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;
use App\Models\Course;
use App\Models\BuyRequest;

use Carbon\Carbon;



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
        if(!empty($alreadyBought)){
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
                return redirect()->route('user.course.request.list')->with(['toast' => 'success', 'msg' => 'Buy Request sent. Admin will contact you shortly']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Buy Request']);
            }
        }
    }

    public function purchase_req_list(){
        if(Session::has("filtered")){
            $data['req_list'] = Session::get("filtered")['req_list'];
            $data['from_date'] = Session::get("filtered")['from_date'];
            $data['to_date'] = Session::get("filtered")['to_date'];
        }else{
            $data['req_list'] = BuyRequest::with("course")->where("user_id",Auth::user()->id)->get()->toArray();
        }

        return view("User.Course.buy_course_list",$data);
        
    }

    public function purchase_req_list_filter(Request $request){
        $controls = $request->all();

        $rules =  [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ];
        $validator = Validator::make($controls,$rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{         
            $from= Carbon::parse($controls['from_date']);
            $to = Carbon::parse($controls['to_date']);
         
            $data['req_list'] = BuyRequest::with("course")->whereDate('payment_date','<=',$to->format('Y-m-d'))
                ->whereDate('payment_date','>=',$from->format('Y-m-d'))->where("user_id",Auth::user()->id)->get()->toArray();

            $data['from_date'] = $controls['from_date'];
            $data['to_date'] = $controls['to_date'];
            return redirect(route("user.course.request.list"))->with("filtered",$data);
        }
       
    }
}
