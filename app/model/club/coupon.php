<?php

namespace App\model\club;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'club_coupon';
    
    protected $fillable = ['code','b_id','o_id','type'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}

