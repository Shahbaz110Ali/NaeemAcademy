<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUserQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_user_id',
        'question_id',
        'answer',
      
    ];
}
