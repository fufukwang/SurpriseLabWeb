<?php

namespace App\model\dark3;

use Illuminate\Database\Eloquent\Model;

class pro extends Model
{
    protected $table = 'dark3pro';
    
    protected $fillable = ['open','day_parts','day','rang_start','rang_end','sites','money','cash','special'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

