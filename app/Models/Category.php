<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'homepage_visibility_layout',
        'status',
    ];

    public function tests() {
        return $this->hasMany('App\Models\Test', 'category_id','id');
    }

    public function child() {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    // Recursive children
    public function children() {
        return $this->hasMany('App\Models\Category', 'parent_id')
          			->with('children');
    }

    // One level parent
    public function parent() {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo('App\Models\Category', 'parent_id')
          			->with('parent');
    }

    public function home_setting(){
        return $this->belongsTo("App\Models\HomeSetting","parent_id");
    }

}
