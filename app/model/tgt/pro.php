<?php

namespace App\model\tgt;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'tgtpro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

