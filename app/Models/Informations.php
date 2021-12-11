<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Informations extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'address',
        'number',
        'complement',
        'district',
        'zipcode',
        'city',
        'state',
        'whatsapp',
        'instagram',
        'facebook',
        'linkein',
        'twitter',
        'pinterest',
        'email',
        'phone1',
        'phone2',
    ];
}
