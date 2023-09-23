<?php

namespace App\model\paris;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'paris_pro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash','special','p1','p2','p4'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

