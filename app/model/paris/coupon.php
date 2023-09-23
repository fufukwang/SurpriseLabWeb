<?php

namespace App\model\paris;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'paris_coupon';
    
    protected $fillable = ['code','b_id','o_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['end_at','created_at', 'updated_at'];
}

