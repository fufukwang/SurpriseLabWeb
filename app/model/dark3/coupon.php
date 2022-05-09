<?php

namespace App\model\tgt2;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'tgt2coupon';
    
    protected $fillable = ['code','b_id','o_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

