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

class TestController extends Controller
{
    public function interface() {
        $interfaces = Category::where("parent_id",null)->get()->toArray();
        return view("Admin.Test.interface", compact('interfaces'));
    }

    public function interface_add() {
        return view("Admin.Test.add_interface");
    }

    public function interface_store(Request $request) {
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'homepage_visibility_layout' => 'required',
            'status' => 'required',
        ],$request->all());
        $interface = Category::create($validated);
        if($interface->id) {
            return redirect()->route('admin.interface')->with(['toast' => 'success', 'msg' => 'Interface created successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Interface']);
        }
    }

    public function interface_save(Request $request) {
        $id = $request->post("id");
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'homepage_visibility_layout' => 'required',
            'status' => 'required',
        ],$request->all());
        $interface = Category::where("id",$id)->update($validated);
        if($interface) {
            return redirect()->route('admin.interface')->with(['toast' => 'success', 'msg' => 'Interface Updated successfully']);
        } else {
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Interface']);
        }
    }

    public function interface_edit($id) {
        $interface = Category::find($id)->toArray();
        return view('Admin.Test.edit_interface', compact('interface'));
    }

    public function  category($id){
        $data["parent"] = Category::where("id",$id)->get()->toArray()[0];
        $data["categories"] = Category::where("parent_id",$id)->get()->toArray();
        $data["tests"] = Test::where("category_id",$id)->get()->toArray();
        // dd($data);
        return view('Admin.Test.categories', compact('data'));

    }

    public function category_add($id) {
        $data["parent"] = Category::where("id",$id)->get()->toArray()[0];
        return view("Admin.Test.add_category",$data);
    }

    public function category_store(Request $request) {
        $controls = $request->all();
        $rules = [
            "parent_id"=> "required",
            "title" =>  "required",
            'status' => "required",
        ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $data = [
                "parent_id"=>$controls["parent_id"],
                "title"=>$controls['title'],
                "status"=>$controls['status'],
            ];
            $category = Category::create($data);
            if($category->id) {
                return redirect()->route('admin.category', $controls["parent_id"])->with(['toast' => 'success', 'msg' => 'Category created successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Category']);
            }
        }
        
        
        
    }

    public function category_save(Request $request) {
        $controls = $request->all();
        $rules = [
            "id"=> "required",
            "title" =>  "required",
            'status' => "required",
        ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $id = $request->post("id");
            $parent_id = $request->post("parent_id");
            $data = [
                "title"=>$controls['title'],
                'status'=>$controls['status'],
            ];
            $interface = Category::where("id",$id)->update($data);
            if($interface) {
                return redirect()->route('admin.category', $parent_id)->with(['toast' => 'success', 'msg' => 'Category Updated successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Category']);
            }

        }
       
        
        
    }

    public function category_edit($id) {
        $category = Category::find($id)->toArray();
        return view('Admin.Test.edit_category', compact('category'));
    }

    public function category_delete($id){
        $categories = Category::with("children")->Where("id",$id)->get()->toArray();
        function buildTree(array $elements) {
            foreach ($elements as $element) {
                if (!empty($element['children'])) {        
                    buildTree($element['children']);
                }
                $tests= Test::where("category_id",$element['id'])->get()->toArray();
                foreach($tests as $test){
                    Test::where("id",$test['id'])->delete();
                    Question::where("test_id",$test['id'])->delete();
                }
                Category::where("id",$element['id'])->delete();
            }
        }
        
        buildTree($categories);
        
        return redirect()->back()->with(['toast' => 'success', 'msg' => 'Category Deleted successfully']);

    }

    public function test_add($category_id) {
        $data['categories'] = Category::all();
        $data["Parentcategory"] = Category::where("id",$category_id)->get()->toArray()[0];
        return view("Admin.Test.add_test",$data);
    }

    public function test_store(Request $request) {

        dd($request);
        $controls = $request->all();
        $rules = [
            "category_id"=> "required",
            "categories" => "required|min:1",
            "categories.*" => "required",
            "name" =>  "required",
            "total_options" =>  "required|min:1",
            'q_per_page'=> 'required',
            "min_marks" =>  "required",
            "marks_per_question" =>  "required",
            "negative_marks" =>  "required",
            "type" =>  "required",
            'status' => "required",
        ];

        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $duration = isset($controls['duration']) ? $controls['duration'] : null;
            
            $data = [
                "name" =>  $controls['name'],
                "category_id"=> $controls['category_id'],
                "duration"=> $duration,
                "marks_per_question" =>  $controls['marks_per_question'],
                "min_marks" =>  $controls['min_marks'],
                "negative_marks" =>  $controls['negative_marks'],
                "total_options" =>  $controls['total_options'],
                "question_per_page"=>$controls['q_per_page'],
                "type" =>  $controls['type'],
                'status' => $controls['status'],
            ];
            $test = Test::create($data);
            if($test->id) {
                return redirect()->route('admin.category', $controls["category_id"])->with(['toast' => 'success', 'msg' => 'Test created successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Test']);
            }
        }
        
        
        
    }

    public function test_edit($id) {
        $test = Test::find($id)->toArray();
        return view('Admin.Test.edit_test', compact('test'));
    }

    public function test_save(Request $request){
        $controls = $request->all();
        $rules = [
            "category_id"=> "required",
            "name" =>  "required",
            "total_options" =>  "required|min:1",
            "q_per_page"=>"required",
            "min_marks" =>  "required",
            "marks_per_question" =>  "required",
            "negative_marks" =>  "required",
            "type" =>  "required",
            'status' => "required",
        ];
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $duration = isset($controls['duration']) ? $controls['duration'] : null;
            
            $data = [
                "name" =>  $controls['name'],
                "category_id"=> $controls['category_id'],
                "duration"=> $duration,
                "marks_per_question" =>  $controls['marks_per_question'],
                "min_marks" =>  $controls['min_marks'],
                "negative_marks" =>  $controls['negative_marks'],
                "total_options" =>  $controls['total_options'],
                "question_per_page"=>$controls['q_per_page'],
                "type" =>  $controls['type'],
                'status' => $controls['status'],
            ];
            $test = Test::where("id",$controls['id'])->update($data);
            if($test) {
                return redirect()->route('admin.category', $controls["category_id"])->with(['toast' => 'success', 'msg' => 'Test updated successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Test']);
            }
        }
    }

    public function test_delete($id){
        if(Test::where("id",$id)->delete()){
            if(Question::where("test_id",$id)->delete()){
                return redirect()->back()->with(['toast' => 'success', 'msg' => 'Test deleted successfully']);
            }else{
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Test Delete, Failed to delete Question']);
            }
        }else{
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to delete test']);
        }
        
    }

    public function question($id){
        $data["test"] = Test::where("id",$id)->get()->toArray()[0];
        $data["questions"] = Question::where("test_id",$id)->get()->toArray();
        return view('Admin.Test.questions', compact('data'));

    }

    public function question_add($test_id) {
        $data["test"] = Test::where("id",$test_id)->get()->toArray()[0];
        return view("Admin.Test.add_question",$data);
    }

    public function question_store(Request $request){
        $controls = $request->all();
        $rules = [
            "test_id"=> "required",
            "question" =>  "required",
            "answer" =>  "required",
            "status" =>  "required",
        ];

        for($i =1; $i <= $controls['total_options']; $i++){
            $rules["option".$i] = "required";
        }
       
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $explanation = !empty($controls['explanation']) ? $controls['explanation'] : null;
            for($i =1; $i <= $controls['total_options']; $i++){
                $options[] = $controls["option".$i];
            }
            $option = json_encode($options);
            $data = [
                "test_id" => $controls['test_id'],
                "question" =>  $controls['question'],
                "option"=> $option,
                "answer" =>  $controls['answer'],
                "explanation" =>  $explanation,
                "status" =>  $controls['status'],
            ];
    
           
            $test = Question::create($data);
            if($test->id) {
                return redirect()->route('admin.question', $controls["test_id"])->with(['toast' => 'success', 'msg' => 'Question created successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to create Question']);
            }
        }

    }

    public function question_edit($id){
        $data['question'] = Question::find($id)->toArray();
        $data['test'] = Test::find($data['question']['test_id'])->toArray();
        
        return view('Admin.Test.edit_question',$data);
    }

    public function question_save(Request $request){
        $controls = $request->all();
        $rules = [
            "id"=> "required",
            "question" =>  "required",
            "answer" =>  "required",
            "status" =>  "required",
        ];

        for($i =1; $i <= $controls['total_options']; $i++){
            $rules["option".$i] = "required";
        }
       
        $validator = Validator::make($controls,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $explanation = !empty($controls['explanation']) ? $controls['explanation'] : null;
            for($i =1; $i <= $controls['total_options']; $i++){
                $options[] = $controls["option".$i];
            }
            $option = json_encode($options);
            $data = [
                "test_id" => $controls['test_id'],
                "question" =>  $controls['question'],
                "option"=> $option,
                "answer" =>  $controls['answer'],
                "explanation" =>  $explanation,
                "status" =>  $controls['status'],
            ];
    
           
            $question = Question::where("id",$controls['id'])->update($data);
            if($question) {
                return redirect()->route('admin.question', $controls["test_id"])->with(['toast' => 'success', 'msg' => 'Question updated successfully']);
            } else {
                return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Question']);
            }
        }

    }

    public function question_delete($id){
        if(Question::where("id",$id)->delete()){
            return redirect()->back()->with(['toast' => 'success', 'msg' => 'Question deleted successfully']);
        }else{
            return redirect()->back()->with(['toast' => 'error', 'msg' => 'Failed to update Question']);
        }
    }



    // public function attachDepartment(Request $request) {
    //     $validated = $request->validate([
    //         'department' => 'required',
    //         'test_id' => 'required'
    //     ],$request->all());
    //     dd($request->all());
    // }
}
