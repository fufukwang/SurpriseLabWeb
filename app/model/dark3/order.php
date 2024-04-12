<?php

namespace App\model\dark3;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'dark3order';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount','is_overseas','is_send','vegetarian','dis_code','dis_money','edit_type',
        'tax_id','tax_name','need_english',
        'meat_eat',
        'no_beef',
        'no_pork',
        'no_nut_m',
        'no_shell',
        'no_fish',
        'no_nut_v',
        'no_alcohol',
        'no_alcohol_v',
        'no_lamb',
    ];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

