<?php

namespace App\model\tertp;

use Illuminate\Database\Eloquent\Model;

class backme extends Model
{
    protected $table = 'tertp_backme';
    
    protected $fillable = ['sn','detail','num','money','name','email','tel','sponsor_id','last_four','is_sent','gen_coup','quarter','manage','p1','p2','p6','gift'];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at','buy_at'];
}

