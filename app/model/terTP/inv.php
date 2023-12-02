<?php

namespace App\model\terTP;

use Illuminate\Database\Eloquent\Model;

class inv extends Model
{
    protected $table = 'tertp_inv';
    
    protected $fillable = ['order_id','number','is_cancal','sent_obj','results'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

