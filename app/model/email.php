<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $table = 'emails';
    protected $fillable = [
        'slug', 'email', 'name','sex','marketing',
    ];
}