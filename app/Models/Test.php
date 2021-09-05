<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use Sluggable;
    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getLink()
    {
        return url('test/' . $this->slug);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function department() {
        return $this->hasMany(Department::class);
    }
}
