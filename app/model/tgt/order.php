<?php

namespace App\model\tgt;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'tgtorder';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','discount'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

