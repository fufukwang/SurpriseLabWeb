<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'slug', 'account', 'password',
    ];
}


