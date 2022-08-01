<?php

namespace App\model\dark3;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'dark3coupon';
    
    protected $fillable = ['code','b_id','o_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

