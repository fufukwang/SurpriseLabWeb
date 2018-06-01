<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class d2coupon extends Model
{
    protected $table = 'd2coupon';
    
    protected $fillable = ['code','xls_id','order_id','wine','is_sent'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

