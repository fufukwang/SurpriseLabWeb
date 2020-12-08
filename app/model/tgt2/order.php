<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'tgt2order';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount','is_overseas','is_send','vegetarian'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

