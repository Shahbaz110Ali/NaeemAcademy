<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','course_id','payment_method','payment_date','amount_paid','image_proof','status'];

    public function course(){
    
        return $this->hasOne('App\Models\Course',"id");
    }

}
