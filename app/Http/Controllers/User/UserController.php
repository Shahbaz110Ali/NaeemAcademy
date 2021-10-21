<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Test;
use App\Models\Question;
use App\Models\TrackTest;
use App\Models\TestUser;
use App\Models\TestUserQuestion;

class UserController extends Controller
{
    public function dashboard(){
        $data['user'] = Auth::user()->toArray();
        return view("User.dashboard",$data);
    }

    public function available_tests(){
        $data['user'] = Auth::user()->toArray();
        $data['tests'] = array();
        $tests = Test::where(["type"=>"competition","status"=>1])->get()->toArray();
        if(!empty($tests)){
            foreach($tests as $key=>$val){
                $test_taken = TestUser::where(["test_id"=>$val['id'],"user_id"=>$data['user']['id']])->get()->toArray();
                if(empty($test_taken)){
                    $data['tests'][$key] =   $val;
                    $cat_id = $data['tests'][$key]['category_id'];
                    while($cat_id != null){
                        $cat = Category::where("id",$cat_id)->get()->ToArray()[0];
                        $data['tests'][$key]['category'][$cat['id']] = $cat['title'];
                        $cat_id = $cat['parent_id'];
                    }
                }
            }
        }

        // dd($data);
        return view("User.available_tests",$data);

    }

    public function taken_tests(){
        $data['user'] = Auth::user()->toArray();
        $data['tests'] = array();
        $test_user = TestUser::where("user_id",$data['user']['id'])->get()->toArray();
        if(!empty($test_user)){
            $index = 0;
            foreach($test_user as $key=>$val){
                $data['tests'][$index] =   Test::where("id",$val['test_id'])->get()->toArray()[0];
                $cat_id = $data['tests'][$index]['category_id'];
                while($cat_id != null){
                    $cat = Category::where("id",$cat_id)->get()->ToArray()[0];
                    $data['tests'][$index]['category'][$cat['id']] = $cat['title'];
                    $cat_id = $cat['parent_id'];
                }
                
                $index++;
            }
        }
        return view("User.taken_tests",$data);
        
    }

    public function profile(){
        $data['user'] = User::where("id",Auth::User()->id)->get()->toArray()[0];
        return view("User.profile",$data);
    }

    public function edit_profile(){
        $data['user'] = User::where("id",Auth::User()->id)->get()->toArray()[0];
        return view("User.edit_profile",$data);
    }

    public function update_profile(Request $request){
        $controls = $request->all();
        $rules =  [
                'name' => 'required',
                'contact' => 'nullable|numeric',
                'user_img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = [
                'name' => $controls['name'],
                'contact' => $controls['contact'], 
            ];
            if( $request->hasFile('user_img')){
                $image = $request->file('user_img');
                $fileName = str_replace(" ","_",pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
                $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                $user_img = $fileName."-".time().".".$image->getClientOriginalExtension();
                $request->file('user_img')->storeAs('public/img/users', $user_img);
                
                $data['image'] = $user_img;
            }
         
            $user = User::where("id",Auth::User()->id)->update($data);
            if($user) {
                return redirect()->route('user.profile')->with(['toast' => 'success', 'msg' => 'User updated successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update User']);
            }
        }
    }

    public function update_password(Request $request){
        $controls = $request->all();
        $rules =  [
            'new_password'         => 'required',
            'confrim_password' => 'required|same:new_password'  
            ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $user = User::where("id",Auth::User()->id)->update(['password' => Hash::make($controls['new_password'])]);
            if($user) {
                return redirect()->route('user.profile')->with(['toast' => 'success', 'msg' => 'Password updated successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Password']);
            }
        }

    }
}
