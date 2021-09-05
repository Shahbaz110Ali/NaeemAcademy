<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisteredSubject extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
