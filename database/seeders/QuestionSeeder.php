<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Test;
use App\Models\Question;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::where(['title'=>"english"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $english[0] = [
                        'test_id'=>$test_id,
                        'question'=> "Ocean currents play a _______role in setting long-term climate_________.",
                        'option'=>json_encode(["vital … date"," important … variations","major … patterns","unusual … changes"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $english[1] = [
                        'test_id'=>$test_id,
                        'question'=> "I promise to ________ you in all circumstances",
                        'option'=>json_encode(["stand up to","stand with","stand off","stand by"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $english[2] = [
                        'test_id'=>$test_id,
                        'question'=> "It’s difficult ______ reconcile such different points of view",
                        'option'=>json_encode(["with","to","in","on"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $english[3] = [
                        'test_id'=>$test_id,
                        'question'=> "The speaker did not properly space out his speech, but went on _______ one point only.",
                        'option'=>json_encode(["stressing","avoiding","devoting","decrying"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $english[4] = [
                        'test_id'=>$test_id,
                        'question'=> "speed limit is the _________ legal speed that you can travel on the road.",
                        'option'=>json_encode(["highest","biggest","maximum","longest"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($english as $data){
                        Question::create($data);
                    }
                }
                
            }
        }

        $categories = Category::where(['title'=>"math"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $math[0] = [
                        'test_id'=>$test_id,
                        'question'=> "The word Geometry has been derived from two Greek words:_____________?",
                        'option'=>json_encode(["Geo means Earth","Metron means Measurement.","Hence Geomatery means","Earth measurement"]),
                        'answer'=> "option4",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $math[1] = [
                        'test_id'=>$test_id,
                        'question'=> "What is the Sum of First 70 even Numbers?",
                        'option'=>json_encode(["4970","4950","4900","4980"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $math[2] = [
                        'test_id'=>$test_id,
                        'question'=> "Express 1.09 in term of Percentage.",
                        'option'=>json_encode(["1.09%","10.9%","109%","None of these"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $math[3] = [
                        'test_id'=>$test_id,
                        'question'=> "Calculate the Average of 1,2,3,4,5.",
                        'option'=>json_encode(["36","40","46","52"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $math[4] = [
                        'test_id'=>$test_id,
                        'question'=> "One Gross is equal to___________?",
                        'option'=>json_encode(["5 Dozen","10 Dozen","12 Dozen","None of them"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($math as $data){
                        Question::create($data);
                    }
                }
                
            }
        }

        $categories = Category::where(['title'=>"science"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $science[0] = [
                        'test_id'=>$test_id,
                        'question'=> "The SI unit of Heat is________?",
                        'option'=>json_encode(["Watt","Volt"," Joule","Newton"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[1] = [
                        'test_id'=>$test_id,
                        'question'=> "The branch of science which deals with the properties of matter and energy is called__________?",
                        'option'=>json_encode(["Biology","Geography","Physics","Chemistry"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[2] = [
                        'test_id'=>$test_id,
                        'question'=> "Physics is one of the branches of___________?",
                        'option'=>json_encode(["Physical sciences","Physical sciences","Social science","Life sciences branch"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[3] = [
                        'test_id'=>$test_id,
                        'question'=> "Which branch of science plays an important role in engineering?",
                        'option'=>json_encode(["Biology","Chemistry","Physics","All of these"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[4] = [
                        'test_id'=>$test_id,
                        'question'=> "The Branch of Physics deals with highly energetic ions is called__________?",
                        'option'=>json_encode(["Elementary articles","Article physics","Ionic physics","Plasma physics"]),
                        'answer'=> "option4",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($science as $data){
                        Question::create($data);
                    }
                }
                
            }
        }

        $categories = Category::where(['title'=>"general"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $science[0] = [
                        'test_id'=>$test_id,
                        'question'=> "The SI unit of Heat is________?",
                        'option'=>json_encode(["Watt","Volt"," Joule","Newton"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[1] = [
                        'test_id'=>$test_id,
                        'question'=> "The branch of science which deals with the properties of matter and energy is called__________?",
                        'option'=>json_encode(["Biology","Geography","Physics","Chemistry"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[2] = [
                        'test_id'=>$test_id,
                        'question'=> "Physics is one of the branches of___________?",
                        'option'=>json_encode(["Physical sciences","Physical sciences","Social science","Life sciences branch"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[3] = [
                        'test_id'=>$test_id,
                        'question'=> "Which branch of science plays an important role in engineering?",
                        'option'=>json_encode(["Biology","Chemistry","Physics","All of these"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[4] = [
                        'test_id'=>$test_id,
                        'question'=> "The Branch of Physics deals with highly energetic ions is called__________?",
                        'option'=>json_encode(["Elementary articles","Article physics","Ionic physics","Plasma physics"]),
                        'answer'=> "option4",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($science as $data){
                        Question::create($data);
                    }
                }
                
            }
        }

        $categories = Category::where(['title'=>"moc"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $science[0] = [
                        'test_id'=>$test_id,
                        'question'=> "The SI unit of Heat is________?",
                        'option'=>json_encode(["Watt","Volt"," Joule","Newton"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[1] = [
                        'test_id'=>$test_id,
                        'question'=> "The branch of science which deals with the properties of matter and energy is called__________?",
                        'option'=>json_encode(["Biology","Geography","Physics","Chemistry"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[2] = [
                        'test_id'=>$test_id,
                        'question'=> "Physics is one of the branches of___________?",
                        'option'=>json_encode(["Physical sciences","Physical sciences","Social science","Life sciences branch"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[3] = [
                        'test_id'=>$test_id,
                        'question'=> "Which branch of science plays an important role in engineering?",
                        'option'=>json_encode(["Biology","Chemistry","Physics","All of these"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[4] = [
                        'test_id'=>$test_id,
                        'question'=> "The Branch of Physics deals with highly energetic ions is called__________?",
                        'option'=>json_encode(["Elementary articles","Article physics","Ionic physics","Plasma physics"]),
                        'answer'=> "option4",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($science as $data){
                        Question::create($data);
                    }
                }
                
            }
        }

        $categories = Category::where(['title'=>"subjective"])->get()->toArray();
        foreach($categories as $cat){
            $tests = Test::where("category_id",$cat['id'])->get()->toArray();
            foreach($tests as $test){
                $test_id = $test['id'];
                for($i = 0; $i < 5 ; $i++){
                    $science[0] = [
                        'test_id'=>$test_id,
                        'question'=> "The SI unit of Heat is________?",
                        'option'=>json_encode(["Watt","Volt"," Joule","Newton"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[1] = [
                        'test_id'=>$test_id,
                        'question'=> "The branch of science which deals with the properties of matter and energy is called__________?",
                        'option'=>json_encode(["Biology","Geography","Physics","Chemistry"]),
                        'answer'=> "option3",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[2] = [
                        'test_id'=>$test_id,
                        'question'=> "Physics is one of the branches of___________?",
                        'option'=>json_encode(["Physical sciences","Physical sciences","Social science","Life sciences branch"]),
                        'answer'=> "option1",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[3] = [
                        'test_id'=>$test_id,
                        'question'=> "Which branch of science plays an important role in engineering?",
                        'option'=>json_encode(["Biology","Chemistry","Physics","All of these"]),
                        'answer'=> "option2",
                        'explanation'=>null,
                        'status'=>1,
                    ];
                    $science[4] = [
                        'test_id'=>$test_id,
                        'question'=> "The Branch of Physics deals with highly energetic ions is called__________?",
                        'option'=>json_encode(["Elementary articles","Article physics","Ionic physics","Plasma physics"]),
                        'answer'=> "option4",
                        'explanation'=>null,
                        'status'=>1,
                    ];

                    foreach($science as $data){
                        Question::create($data);
                    }
                }
                
            }
        }
    }
}
