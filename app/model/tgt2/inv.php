<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class inv extends Model
{
    protected $table = 'tgt2inv';
    
    protected $fillable = ['order_id','number','is_cancal','sent_obj','results'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

