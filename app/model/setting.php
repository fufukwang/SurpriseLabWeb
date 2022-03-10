<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'slug', 'json',
    ];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}