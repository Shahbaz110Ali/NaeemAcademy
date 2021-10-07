<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "type",
        "course_image",
        "price",
        "discount",
        "creator",
        "creator_image",
        "status",
    ];
    
}
