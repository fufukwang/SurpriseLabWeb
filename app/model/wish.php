<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class wish extends Model
{
    protected $table = 'home_wish';
    
    protected $fillable = ['type','wish','ip','agent','manage'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

