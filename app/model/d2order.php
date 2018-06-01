<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class d2order extends Model
{
    protected $table = 'd2order';
    
    protected $fillable = ['pro_id','pople','name','tel','email','notes','meat','coupon','sn','money','pay_type','pay_status','result','manage','return_result'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

