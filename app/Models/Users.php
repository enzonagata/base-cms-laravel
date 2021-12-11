<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'name', 
        'email',
        'password',
        'token',
        'active'
    ];

    protected $hidden = [
        'password',
    ];

    public $rules = [
        'name'=>'required', 
        'email'=>'required',
        'password'=>'required',
    ];
}
