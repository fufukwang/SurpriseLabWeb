<?php

namespace App\model\terminal;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'terminalorder';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount','is_overseas','is_send','vegetarian','dis_code','dis_money','edit_type','plan','cut','refund','handling','num_f','num_b','num_t','need_english','tax_id','tax_name',];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];


    public function pros()
    {
        return $this->belongsToMany('App\model\terminal\pro','terminal_pro_order','order_id','pro_id');
    }
}

