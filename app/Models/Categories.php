<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'type',
        'url'
    ];

    public function contents(){
        return $this->belongsToMany('App\Models\Contents','categories_has_contents');
    }
}
