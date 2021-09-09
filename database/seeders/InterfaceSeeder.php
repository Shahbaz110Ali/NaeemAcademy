<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class InterfaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'parent_id'=>null,
            'title'=>"FIA",
            'description'=>"The Federal Investigation Agency, being Pakistan’s premier investigation agency, deals with multifaceted serious and organized crimes like Immigration, Anti-human Trafficking, Anti-corruption, Protection of Intellectual Property Rights, Cyber Crime, Money Laundering etc. At the same time it is the lead agency for investigation of",
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>null,
            'title'=>"PST / JEST",
            'description'=>"As a school teacher, you'll develop schemes of work and lesson plans in line with curriculum objectives. You'll facilitate learning by establishing",
            'status'=>1,
        ];
        $data[] = [
            'parent_id'=>null,
            'title'=>"MOC",
            'description'=>"The traditional MOC exam is ABIM's enhanced 10-year exam. If you're interested in taking this exam, here's some quick information to help guide your",
            'status'=>1,
        ];
        for($i = 0; $i < 3; $i++){
            Category::create($data[$i]);
        }
        
    }
}
