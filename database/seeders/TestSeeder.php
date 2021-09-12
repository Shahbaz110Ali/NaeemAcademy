<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [3,4,5,7,8,9,11,12,13];
        foreach($categories as $dynamic){
            $test = [
                'name'=>"Preparation Test",
                'category_id'=>$dynamic,
                'duration'=>null,
                'marks_per_question'=>"1",
                'min_marks'=>"1",
                'negative_marks'=>"0",
                'total_options'=>4,
                'question_per_page'=>20,
                'type'=>"practice",
                'status'=>1,
            ];
            Test::create($test);
            $test = [
                'name'=>"Preparation Test 3 min",
                'category_id'=>$dynamic,
                'duration'=>"3",
                'marks_per_question'=>"1",
                'min_marks'=>"1",
                'negative_marks'=>"0",
                'total_options'=>4,
                'question_per_page'=>20,
                'type'=>"practice",
                'status'=>1,
            ];
            Test::create($test);
            $test = [
                'name'=>"Competition Test",
                'category_id'=>$dynamic,
                'duration'=>null,
                'marks_per_question'=>"1",
                'min_marks'=>"1",
                'negative_marks'=>"0",
                'total_options'=>4,
                'question_per_page'=>20,
                'type'=>"competition",
                'status'=>1,
            ];
            Test::create($test);
            $test = [
                'name'=>"Competition Test 3 min",
                'category_id'=>$dynamic,
                'duration'=>"3",
                'marks_per_question'=>"1",
                'min_marks'=>"1",
                'negative_marks'=>"0",
                'total_options'=>4,
                'question_per_page'=>20,
                'type'=>"competition",
                'status'=>1,
            ];
            Test::create($test);
            
        }

    }
}
