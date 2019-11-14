<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'club_order';
    
    protected $fillable = ['pro_id','pople','name','dial_code','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount','is_overseas','can_re'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

