<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'question',
        'option',
        'answer',
        'explanation',
        'status',
    ];

    public function test() {
        return $this->belongsTo("App\Models\Test");
    }

    public function track_tests() {
        return $this->hasMany("App\Models\TrackTest","question_id","id");
    }
}
