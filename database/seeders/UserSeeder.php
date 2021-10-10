<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ref = 1000;
        User::create([
            'name'=>'admin',
            'email'=>"admin@gmail.com",
            "password"=>Hash::make('password'),
            'contact'=>null,
            "referral_id"=> $ref,
            "referred_by"=>null,
        ]);

        for($i =1 ; $i <=  20 ; $i++){
            User::create([
                'name'=>'User'.$i,
                'email'=>"user$i@gmail.com",
                "password"=>Hash::make('password'),
                'contact'=>null,
                "referral_id"=> ($ref+$i+1),
                "referred_by"=>null,
            ]);
        }
    }
}
