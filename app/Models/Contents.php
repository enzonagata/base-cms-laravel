<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Contents extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'title',        
        'custom_date',
        'description',
        'short_description',
        'content',
        'price',
        'announcement_type',
        'email',
        'phone',
        'image',
        'type',
        'url'
    ];

    public $rules = [
        'title' => 'required',
        'type'=>'required',
    ];

    public function images(){
        return $this->hasMany('App\Models\ContentsImages');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Categories','categories_has_contents');
    }
}
