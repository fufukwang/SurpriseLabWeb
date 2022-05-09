<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'tgt2pro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash','special'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

