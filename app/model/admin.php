<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'slug', 'account', 'password','thegreattipsy','giftadd','admin','oldview',
        'clubtomorrow',
        'tgt2','dark3',
        'terminal'
    ];
}


