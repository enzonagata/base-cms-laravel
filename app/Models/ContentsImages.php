<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContentsImages extends Model
{
    public $timestamps = false;

    public $table = 'contents_images';

    protected $fillable = [
        'description','type','order','image','path'
    ];

    public $rules = [
        'title' => 'required',
        'type'=>'required',
    ];

    public function contents(){
        return $this->belongsTo('App\Models\ContentsImages');
    }
}
