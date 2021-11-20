<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_types = ["Mathematics","Science","English"];
        $titles = ["Ideal Mathematics","Science for everyone","World is yours"];
        $descriptions = [
            "Mathematics is the science and study of quality, structure, space, and change.",
            "Science is the pursuit and application of knowledge and understanding of the natural and social world following a systematic methodology based on evidence",
            "English is the Language of International Communication. Although English is not the most spoken language in the world"
        ];
        $prices = ["400","10000","5000"];
        $discounts = ["0","10","25"];
        $creators = ["Naeemullah","Shahbaz","Sallar"];
        for($i = 0 ; $i < 3 ; $i++){
            Course::create([
                'title'=>$titles[$i],
                'description'=>$descriptions[$i],
                "type"=>$course_types[$i],
                'course_image'=>"default.jpg",
                "price"=>$prices[$i],
                "discount"=>$discounts[$i],
                "creator"=>$creators[$i],
                "creator_image"=>"default.jpg",
                "status"=>1,
            ]);
        }
    }
}
