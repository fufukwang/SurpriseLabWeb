<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class d2pro extends Model
{
    protected $table = 'd2pro';
    
    protected $fillable = ['open','dayparts','day','rangstart','rangend','sites','money','cash'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

