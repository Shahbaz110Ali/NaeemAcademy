<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->truncate();
        // DB::table('categories')->insert([[
        //     'title' => 'JST/PST'
        // ], [
        //     'title' => 'General Test'
        // ], [
        //     'title' => 'Departmental Test'
        // ], [
        //     'title' => 'Mock Test'
        // ]]);

        $data[] = [
            'parent_id'=>1,
            'title'=>"General",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>1,
            'title'=>"Subjective",
            'description'=>null,
            'status'=>1,
        ];

        $data[] = [
            'parent_id'=>2,
            'title'=>"JEST",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>6,
            'title'=>"English",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>6,
            'title'=>"Math",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>6,
            'title'=>"Science",
            'description'=>null,
            'status'=>1,
        ];

        $data[] = [
            'parent_id'=>2,
            'title'=>"PST",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>10,
            'title'=>"English",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>10,
            'title'=>"Math",
            'description'=>null,
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>10,
            'title'=>"Science",
            'description'=>null,
            'status'=>1,
        ];

       
        foreach($data as $val){
            Category::create($val);
        }
    }
}
