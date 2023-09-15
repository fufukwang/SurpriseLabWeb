<?php

namespace App\model\paris;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'paris_order';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount','is_overseas','is_send','vegetarian','dis_code','dis_money','edit_type',
        'tax_id','tax_name','need_english','need_chinese','vehicle',
        'co_code',
        'co_money',
        'ticket',
    ];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

