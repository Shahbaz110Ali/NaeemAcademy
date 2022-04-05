<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'duration',
        'marks_per_question',
        'min_marks',
        'negative_marks',
        'total_options',
        'question_per_page',
        'type',
        'status',
    ];
    // use Sluggable;
    // protected $guarded = [];

    // public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    // public function getLink()
    // {
    //     return url('test/' . $this->slug);
    // }

    public function categories() {
        return $this->belongsToMany("App\Models\Category",'test_categories');
    }


    // public function test_category() {
    //     return $this->hasMany("App\Models\TestCategory","test_id","id");
    // }

    

    public function track_tests() {
        return $this->hasMany("App\Models\TrackTest","test_id","id");
    }

    public function questions() {
        return $this->hasMany("App\Models\Question","test_id","id");
    }

    public function users()
    {
        return $this->belongsToMany("App\Models\User","test_users");
    }

    
}
