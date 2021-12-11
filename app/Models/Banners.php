<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'image',
        'title',
        'info1',
        'info2',
        'info3',
        'link1',
        'link2',
        'link3',
        'path',
        'status',
        'order'
    ];

    public $rules = [
        'image' => 'required',
        'title' => 'required',
    ];
    public $rules_update = [
        'title' => 'required',
    ];
}
