<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'tpe',
        'status',
    ];
  
    public function home_setting(){
        return $this->hasMany("App\Models\category","category_id");
    }
}
