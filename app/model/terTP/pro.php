<?php

namespace App\model\terTP;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'tertp_pro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash','special','p1','p2','p6'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

